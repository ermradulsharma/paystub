<?php

use App\Models\Image;
// use PDF;

function uploadImage($module, $module_id, $files , $path = "images", $name = null)
{
    $path =  IMAGE_UPLOAD_PATH . $path;

    if (is_object($files)) {
        $file = $files;
        $extension = $file->extension();
        $fileName = date('dmY-his-') . uniqid() . '.' . $extension;
        $fileName = $name != null ? $name : str_replace(" ", "_", $fileName);
        $file->storeAs($path, $fileName);
        $mime = $file->getMimeType();

        $fileType = "";
        if (strstr($mime, "image/")) {
            $fileType = "image";
        } else if (strstr($extension, "pdf")) {
            $fileType = "pdf";
        }
        $image = Image::where(['module_type' => $module, 'module_id' => $module_id])->first();
        if(!$image){
            $image = new Image();
            $image->module_type = $module;
            $image->module_id = $module_id;
        }
        $image->file = $fileName;
        $image->file_type = $fileType;
        $image->file_extension = $extension;
        $image->thumbnail = '';
        $image->save();
    }
    return $image->id;
}

function deleteImage($module, $id, $path = null)
{
    $images = Image::where(['module_type' => $module, 'module_id' => $id])->get();

    foreach ($images as $img) {
        try {
            $path = STORAGE_UPLOAD_PATH . $path;
            unlink($path . '/' . basename($img->file));
        } catch (Exception $e) {
            return $e;
        }
    }
    Image::where(['module_type' => $module, 'module_id' => $id])->delete();
    return "success";
}
