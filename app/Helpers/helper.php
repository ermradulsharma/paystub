<?php

use App\Models\Image;

function uploadImage($module, $module_id, $files, $path = "images")
{
    $path =  IMAGE_UPLOAD_PATH . $path;
    if (is_object($files)) {
        $file = $files;
        // dd($file);
        $extension = $file->extension();
        $fileName = date('dmY-his-') . uniqid() . '.' . $extension;
        $fileName = str_replace(" ", "_", $fileName);
        //$file->move($path, $fileName);
        $file->storeAs($path, $fileName);
        $mime = $file->getMimeType();

        $fileType = "";
        if (strstr($mime, "video/")) {
            $fileType = "video";
        } else if (strstr($mime, "image/")) {
            $fileType = "image";
        } else if (strstr($mime, "audio/")) {
            $fileType = "audio";
        }
        if ($fileType == "video") {
            $thumbnail = $path . "/thumbnail/";
            if (!is_dir($thumbnail)) {
                mkdir($thumbnail);
            }
            $videoUrl = $path . '/' . $fileName;
            $storageUrl = $thumbnail;
            $thumbnailName = date('dmY-his-') . uniqid() . '.png';
        }
        $image = new Image();
        $image->module_type = $module;
        $image->module_id = $module_id;
        $image->file = $fileName;
        $image->file_type = $fileType;
        $image->file_extension = $extension;
        $image->thumbnail = "";
        $image->save();
    }
    return "success";
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
