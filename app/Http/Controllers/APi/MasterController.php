<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller{

    use CreatedByUpdatedByTrait;

    protected int $paginationNumber = 15;
    protected array $excludedColumns = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function __construct(
        public $model,
        public $storeRequest,
        public $updateRequest,
        public $simpleResource,
        public $detailedResource,
        array $excludedColumns = []
    ) {
        $this->excludedColumns = array_merge($this->excludedColumns, $excludedColumns);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->buildQuery($request);
        $paginationNumber = $request->input('per_page', $this->paginationNumber);
        $data = $query->paginate($paginationNumber);

        return ApiResponse::ok($this->simpleResource::collection($data));
    }

    /**
     * Get all data without pagination.
     */
    public function getAllData()
    {
        $resource = $this->simpleResource;
        return $resource::collection($this->model::orderBy('id', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $request = resolve($this->storeRequest);
        $model = new $this->model;

        if (method_exists($model, 'mergeRequest')) {
            $request->merge($model->mergeRequest());
        }
        if (array_key_exists('status', $model->getAttributes())) {
            $request->merge(['status' => OrderStatusEnum::Success->value]);
        }

        DB::beginTransaction();
        try {
            $rawData = $this->getValidatedData($request, $model);
            $model = $this->model::create($rawData);

            $this->callModelMethod($model, 'afterStore');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error($e->getMessage());
        }

        $this->callModelMethod($model, 'afterCreateProcess');
        return ApiResponse::created($this->detailedResource::make($model));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $resource = $this->model::findOrFail($id);
        return ApiResponse::ok($this->detailedResource::make($resource));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id)
    {
        $request = resolve($this->updateRequest);
        $model = $this->model::findOrFail($id);

        if (method_exists($model, 'mergeRequest')) {
            $request->merge($model->mergeRequest($id));
        }

        $this->callModelMethod($model, 'beforeUpdateProcess');

        DB::beginTransaction();
        try {
            $rawData = $this->getValidatedData($request, $model);
            $model->update($rawData);

            $this->callModelMethod($model, 'afterUpdate');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error($e->getMessage());
        }

        $this->callModelMethod($model, 'afterUpdateProcess');
        return ApiResponse::ok($this->detailedResource::make($model));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $resource = $this->model::findOrFail($id);
        $resource->delete();
        return ApiResponse::ok(null, 'Data deleted successfully');
    }

    public function getCount()
    {
        $modelCount = $this->model::count();
        return ApiResponse::ok(['count' => $modelCount]);
    }

    /**
     * Helper method to build query with search, filter, and sorting
     */
    protected function buildQuery(Request $request)
    {
        $query = $this->model::query();

        // Handle search
        if ($request->has('search')) {
            $this->applySearch($query, $request->input('search'));
        }

        // Handle filters
        if ($request->has('filter')) {
            $this->applyFilters($query, $request->input('filter'));
        }

        // Handle sorting
        $sortBy = $request->input('sort_by', 'id');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        return $query;
    }

    protected function applySearch($query, string $search)
    {
        $searchableColumns = array_diff((new $this->model)->getFillable(), $this->excludedColumns);
        $query->where(function ($q) use ($searchableColumns, $search) {
            foreach ($searchableColumns as $column) {
                $q->orWhere($column, 'LIKE', "%{$search}%");
            }
        });
    }

    protected function applyFilters($query, array $filters)
    {
        foreach ($filters as $field => $value) {
            $query->where($field, $value);
        }
    }

    protected function getValidatedData($request, $model)
    {
        $fillable = $model->getFillable();
        $rawData = $request->only($fillable);
        return $this->addCreatedByAndUpdatedBy($fillable, $rawData);
    }

    protected function callModelMethod($model, string $methodName)
    {
        if (method_exists($model, $methodName)) {
            $model->$methodName($model);
        }
    }
}
