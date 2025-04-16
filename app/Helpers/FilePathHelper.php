<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http;
use Illuminate\Support\Facades\Storage;

class FilePathHelper{

    public static function filePath($file){
        $filePath = $file->store("uploads" ,"public");
        return $filePath;
    }

    private function storefile(){
        
    }


    // $images=[];
    // if ($request->allFiles()) {
    //     $allFiles = $request->allFiles();
    //     foreach($allFiles as $key=>$file){
    //         $filePath = FilePathHelper::filePath($request->file($key));
    //         $images[$key] = $filePath;
    //     }
    // }
    // $oldFileName = $initialFileName;
        // $fileInfo =(object)(pathinfo($oldFileName));
        // $newFileName= $fileInfo->filename."_".Carbon::now().$fileInfo->extension;
        // $newFilepath = $newFileName;
        // if($storagePath){
        //     $newFilepath = $storagePath."/".$newFileName;
        // }
}