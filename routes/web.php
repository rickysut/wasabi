<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage; 
use Aws\S3\Exception\S3Exception;

Route::get('/', function () {
    return view('fileUpload');    
});

Route::post('upload', function () {
    $file = request()->file('file');
    try {
        $filePath = $file->hashName();
        $message = 'Failed Upload';
        $path = Storage::disk('wasabi')->put($filePath, file_get_contents($file));
        if ($path) {
            $message = 'Success Upload';   
        }
        return redirect()->back()->with(['success' => $message]);
    } catch (S3Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    };

})->name('upload');
