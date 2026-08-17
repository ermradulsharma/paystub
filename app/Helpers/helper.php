<?php

use App\Models\Image;
use App\Models\PaySlip;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

function uploadImage($module, $module_id, $files, $path = 'images', $name = null)
{
    $image = null;
    $uploadPath = defined('IMAGE_UPLOAD_PATH') ? IMAGE_UPLOAD_PATH . $path : 'public/' . $path;

    if (is_object($files)) {
        $file = $files;
        $extension = $file->extension();
        $fileName = date('dmY-his-') . uniqid() . '.' . $extension;
        $fileName = $name != null ? $name : str_replace(' ', '_', $fileName);
        $file->storeAs($uploadPath, $fileName);
        $mime = $file->getMimeType();

        $fileType = '';
        if (strstr($mime, 'image/')) {
            $fileType = 'image';
        } elseif (strstr($extension, 'pdf')) {
            $fileType = 'pdf';
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

    return $image ? $image->id : null;
}

function deleteImage($module, $id, $path = null)
{
    $images = Image::where(['module_type' => $module, 'module_id' => $id])->get();

    foreach ($images as $img) {
        try {
            $storagePath = defined('STORAGE_UPLOAD_PATH') ? STORAGE_UPLOAD_PATH . $path : storage_path('public/' . $path);
            if (file_exists($storagePath . '/' . basename($img->file))) {
                unlink($storagePath . '/' . basename($img->file));
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    Image::where(['module_type' => $module, 'module_id' => $id])->delete();

    return 'success';
}

function invoiceMail($user_id, $type)
{
    $paySlipObj = PaySlip::where(['user_id' => $user_id])->exists();
    if ($paySlipObj) {
        $invoice = PaySlip::where(['user_id' => $user_id, 'type' => $type])->orderBy('id', 'desc')->first();
        if ($invoice && isset($invoice->data)) {
            $requestData = json_decode($invoice->data);
            $requestData = collect($requestData);
            $requestData['watermark'] = 'no';
            $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'] ?? '';

            $path = public_path('/uploads/mailData');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $invoiceData['requestData'] = $requestData;
            
            if ($pageName && isset($requestData['form_type'])) {
                $pdf = \PDF::loadView('allForms/' . $requestData['form_type'] . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
                $fileName = date('_d_m_Y_h_i_s') . '.pdf';
                $pdf->save($path . '/' . $fileName);

                $user = User::find($user_id) ?? (Auth::check() ? Auth::user() : null);
                if ($user && !empty($user->email)) {
                    $mailData = [
                        'email' => $user->email,
                        'title' => 'Please find attachment file',
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
                        \Log::error('Invoice Mail Send Error: ' . $e->getMessage());
                    }
                }
                return 'success';
            }
        }
    }

    return 0;
}

function generateRandomToken($length = 10, $string = 'xyz')
{
    $characters = $string . '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . time();
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = [];
    $words = [
        0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety',
    ];
    $digits = ['', 'hundred', 'thousand', 'lakh', 'crore'];
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && isset($str[0]) && $str[0]) ? '' : null;
            $word1 = $words[$number % 10] ?? '';
            $wordTens = $words[floor($number / 10) * 10] ?? '';
            $str[] = ($number < 21) ? ($words[$number] ?? '') . ' ' . ($digits[$counter] ?? '') . $plural . ' ' . $hundred : $wordTens . ' ' . $word1 . ' ' . ($digits[$counter] ?? '') . $plural . ' ' . $hundred;
        } else {
            $str[] = null;
        }
    }
    $Rupees = implode('', array_reverse(array_filter($str)));
    if ($decimal == 0) {
        $cents = '';
    } elseif ($decimal > 0 && $decimal < 21) {
        $cents = ($words[$decimal] ?? '') . ' Cents';
    } else {
        $cents = (($words[floor($decimal / 10) * 10] ?? '') . ' ' . ($words[$decimal % 10] ?? '')) . ' Cents';
    }

    return ($Rupees ? $Rupees . 'Dollars ' : '') . '<span style="text-transform: lowercase !important;">and </span>' . $cents;
}

function addressTwo($obj, $lineBreak = false, $comma = false)
{
    $addressStr = '';

    if (isset($obj['address_2']) && $obj['address_2'] != '') {
        if ($lineBreak) {
            $addressStr .= '<br>';
        }
        if ($comma) {
            $addressStr .= ',';
        }

        $addressStr .= $obj['address_2'] ?? '';
    }

    return $addressStr;
}

function empAddressTwo($obj, $lineBreak = false, $comma = false)
{
    $addressStr = '';

    if (isset($obj['emp_street_2']) && $obj['emp_street_2'] != '') {
        if ($lineBreak) {
            $addressStr .= '<br>';
        }
        if ($comma) {
            $addressStr .= ',';
        }

        $addressStr .= $obj['emp_street_2'] ?? '';
    }

    return $addressStr;
}
