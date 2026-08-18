<?php

namespace App\Services;

use App\Models\PaySlip;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaystubService
{
    /**
     * Generate paystub PDF file from request data and store in mailData folder.
     *
     * @param array $requestData
     * @return array
     */
    public function generatePdf(array $requestData): array
    {
        try {
            $formType = $requestData['form_type'] ?? 'usa';
            if ($formType == 'w2form') {
                $pageName = 'w2form';
            } else {
                $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'] ?? 'paystubx_basic';
            }

            $path = public_path('uploads/mailData');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $invoiceData['requestData'] = $requestData;
            $pdf = PDF::loadView('allForms/' . $formType . '/' . $pageName, $invoiceData)
                ->setPaper('a4', 'portrait')
                ->set_option('isRemoteEnabled', true);

            $fileName = date('_d_m_Y_h_i_s') . '.pdf';
            $pdf->save($path . '/' . $fileName);

            return [
                'success' => true,
                'status' => 200,
                'file_name' => $fileName,
                'pdf_url' => asset('uploads/mailData/' . $fileName),
            ];
        } catch (Exception $e) {
            Log::error('PaystubService PDF Generation Error: ' . $e->getMessage());
            return [
                'success' => false,
                'status' => 500,
                'message' => DEFAULT_ERROR_MESSAGE,
            ];
        }
    }

    /**
     * Send generated paystub invoice PDF attachment via email.
     *
     * @param int $userId
     * @param string $type
     * @return bool
     */
    public function sendInvoiceMail(int $userId, string $type): bool
    {
        try {
            $invoice = PaySlip::where(['user_id' => $userId, 'type' => $type])->latest()->first();
            if (!$invoice || empty($invoice->data)) {
                return false;
            }

            $requestData = json_decode($invoice->data, true);
            $requestData['watermark'] = 'no';

            $result = $this->generatePdf($requestData);
            if (!$result['success']) {
                return false;
            }

            $user = User::find($userId) ?? Auth::user();
            if ($user && !empty($user->email)) {
                $file = public_path('uploads/mailData/' . basename($result['file_name']));
                Mail::send('mail.invoice_mail', [], function ($message) use ($user, $file) {
                    $message->to($user->email)
                        ->subject('Your Generated Paystub Invoice Document');
                    if (file_exists($file)) {
                        $message->attach($file);
                    }
                });
                return true;
            }
        } catch (Exception $e) {
            Log::error('PaystubService Mail Delivery Error: ' . $e->getMessage());
        }

        return false;
    }

    /**
     * Generate PDF and persist paystub record in DB using atomic transaction.
     *
     * @param array $requestData
     * @return array
     */
    public function generateAndStoreRecord(array $requestData): array
    {
        $pdfResult = $this->generatePdf($requestData);
        if (!$pdfResult['success']) {
            return $pdfResult;
        }

        try {
            return \Illuminate\Support\Facades\DB::transaction(function () use ($requestData, $pdfResult) {
                $slip = new PaySlip();
                $slip->user_id = Auth::id() ?? ($requestData['user_id'] ?? 0);
                $slip->reference = 'PayStubx-' . rand(100000, 999999);
                $slip->data = json_encode($requestData);
                $slip->type = $requestData['form_type'] ?? 'usa';
                $slip->title = $requestData['cname'] ?? '';
                $slip->pdf = $pdfResult['file_name'];
                $slip->save();

                return [
                    'success' => true,
                    'status' => 200,
                    'pdf' => $pdfResult['pdf_url'],
                ];
            });
        } catch (Exception $e) {
            Log::error('PaystubService Record Persistence Error: ' . $e->getMessage());
            return [
                'success' => false,
                'status' => 500,
                'message' => DEFAULT_ERROR_MESSAGE,
            ];
        }
    }
}
