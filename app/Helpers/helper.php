<?php

use App\Models\Image;
use App\Models\PaySlip;
use \File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use \PDF;

function uploadImage($module, $module_id, $files, $path = "images", $name = null)
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
        if (!$image) {
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

function invoiceMail($user_id)
{
    $paySlipObj = PaySlip::where(['user_id' => $user_id])->exists();
    if ($paySlipObj) {
        $invoice = PaySlip::where(['user_id' => $user_id])->orderBy('id', 'desc')->first();
        if ($invoice->id != null) {
            $invoice = $invoice->where('id', $invoice->id);
        }
        $invoice = $invoice->orderBy('id', 'desc')->first();
        $requestData = json_decode($invoice->data);
        $requestData = collect($requestData);
        $requestData['watermark'] = 'no';
        $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'];

        $path = public_path('/uploads/mailData');
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/' . $requestData['form_type'] . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
        $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
        $pdf->save($path . '/' . $fileName);
        if ($invoice) {
            $mailData = [
                'email' => Auth::user()->email,
                'title' => 'Please find attachment file'
            ];
            $moreData = [];
            $file = public_path('/uploads/mailData/' . basename($fileName));
            try {
                Mail::send('mail.invoice_mail', $moreData, function ($message) use ($mailData, $file) {
                    $message->to($mailData['email']);
                    $message->subject($mailData['title']);
                    $message->attach($file);
                });
            } catch (\Exception $e) {
                $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            }
        }
        if ($invoice->id != null) {
           return 'success';
        }
    }
    return 0;
}
