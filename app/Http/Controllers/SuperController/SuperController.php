<?php

namespace App\Http\Controllers\SuperController;

use App\Http\Controllers\Controller;

class SuperController extends Controller
{

    private $model;
    public function __construct(
        public $modelNamespace,
        public $storeRequest,
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


    public function getAllData()
    {
        return $this->model->get();
    }

    public function store()
    {
        $request = resolve($this->storeRequest);
        $model = $this->model;
        $rawData = $this->getValidatedData($request, $model);
    }


    protected function getValidatedData($request, $model)
    {
        $fillable = $model->getFillable();
        $rawData = $request->only($fillable);
        return $rawData;
    }

}