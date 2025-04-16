<?php

namespace App\Http\Controllers\SuperController;

use App\Helpers\FilePathHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SuperController extends Controller
{

    private $model;
    public function __construct(
        public $modelNamespace,
        public $storeRequest,
        public $updateRequest,
    ) {
        $this->setModel($this->modelNamespace);
    }

    private function setModel(string $modelNamespace)
    {
        if (class_exists($modelNamespace)) {
            $this->model = resolve($modelNamespace); // Model instantiation
        } else {
            abort(404, "Model not found: " . $modelNamespace);
        }
    }


    public function getAllData(string $Orderby = "created_at", string $Order = 'desc')
    {
        return $this->model->$Orderby($Orderby, $Order)->get();
    }
    public function getPaginatedData(int $perpage = 10, string $Orderby = "created_at", string $Order = 'desc')
    {
        return $this->model->orderBy($Orderby, $Order)->paginate($perpage);
    }
    public function store()
    {
        $request = resolve($this->storeRequest);
        $model = $this->model;
        try {
            DB::beginTransaction();
            $rawData = $this->getValidatedData($request, $model);
            $model = $this->model::create($rawData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("message", $e->getMessage());
        }
    }

    public function update(int $id)
    {
        $request = resolve($this->updateRequest);
        $model = $this->model;
        try {
            DB::beginTransaction();
            $rawData = $this->getValidatedData($request, $model);
            $model = $this->model::findOrFail($id);
            $model->update($rawData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("message", $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        $model = $this->model::findOrFail($id);
        try {
            DB::beginTransaction();
            $model->delete();
            Db::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("message", $e->getMessage());
        }
    }

    protected function getValidatedData($request, $model)
    {
        $fillable = $model->getFillable();
        $rawData = $request->only($fillable);
        $path=[];
        if(!empty($request->allFiles())){
            foreach($request->allFiles() as $index=>$file){
                $path[$index] = FilePathHelper::filePath($file);
            }
            
        }
        
        $rawData  = array_merge($rawData ,$path);
        return $rawData;
    }

}