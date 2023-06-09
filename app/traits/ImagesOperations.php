<?php

namespace App\traits;

use Illuminate\Support\Facades\Storage;

trait ImagesOperations
{

    public $PRODUCTS_COVERIMAGES_PATH='images/products/coverImages';
    public $PRODUCTS_IMAGES_PATH='images/products/images';
    public $MUSCLES_COVERIMAGES_PATH='images/muscles/coverImages';
    public $MUSCLES_PARTSIMAGES_PATH='images/muscles/parts/coverImages';
    public $FILES_PATH='files';
    public function storeFile($file, $path, $disk = 'public')
    {
        try {
            if (is_file($file) && !file_exists(public_path($file)) && !is_string($file)){
                $path = $file->store($path, ['disk' => $disk]);
                if ($disk == 'public') {
                    return 'storage/' . $path;
                }
                return $path;
            }
            return $file;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    public function replaceFile($oldFilePath, $newFile, $newFilePath, $disk = 'public')
    {
        try {

                $path = $this->storeFile($newFile, $newFilePath, $disk);
                if ($path){
                    $oldPath = public_path($oldFilePath);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                    return $path;
                }

            return null;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function deleteFile($filePath, $disk = 'public'): bool
    {
        try {
            $oldPath = public_path($filePath);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function deleteCollectionOfFiles($filesPaths, $disk = 'public')
    {
        try {
            foreach ($filesPaths as $filePath) {
                if (file_exists($filePath)) {
                    unlink(public_path($filePath));
                }
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function moveFile($sourcePath,$destinationPath){
        try {
            Storage::move($sourcePath, $destinationPath);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return false;
        }
    }


}
