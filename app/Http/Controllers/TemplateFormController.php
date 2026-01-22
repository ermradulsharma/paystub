<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Currency;
use App\Models\Deduction;
use App\Models\PaySlip;
use App\Models\StateTax;
use App\Models\Template;
use App\Models\User;
use App\Services\ValidationService;
use Carbon\Carbon;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;
use function PHPSTORM_META\type;

class TemplateFormController extends Controller
{
    public function edit($id)
    {
        $invoiceData = PaySlip::find($id);
        $deduction = Deduction::where(['state' => $invoiceData->type])->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => $invoiceData->type, 'type' => 'basic', 'status' => 1])->orderBy('title')->with('images')->get();
        $advanceType = Template::where(['state' => $invoiceData->type, 'type' => 'advance', 'status' => 1])->orderBy('title')->with('images')->get();

        if ($invoiceData->type == 'canada') {
            $countryCode = 'CA';
        } elseif ($invoiceData->type == 'global') {
            $countryCode = 'USA';
        } elseif ($invoiceData->type == 'usa') {
            $countryCode = 'USA';
        } elseif ($invoiceData->type == 'uk') {
            $countryCode = 'UK';
        }
        $stateTaxes = StateTax::where('country_code', $countryCode)->orderBy('state')->get();
        $currencies = Currency::get();
        $employerList = Address::where(['type' => 'employer', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
        $employeeList = Address::where(['type' => 'employee', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();

        return view('lists/'.$invoiceData->type.'-edit', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies', 'invoiceData', 'employerList', 'employeeList'));
    }

    // ======= USA Preview Data =========
    public function templates(Request $request)
    {
        $response = (new ValidationService)->usa($request);
        if ($response['status'] == 301) {
            return response()->json($response, $response['status']);
        }
        $requestData = $request->all();
        if ($requestData['form_type'] == 'w2form') {
            $pageName = 'w2form';
            $requestData['watermark'] = 'yes';
        } else {
            if ($requestData['advance_temp']) {
                $pageName = $requestData['advance_temp'];
            } else {
                $pageName = $requestData['basic_temp'];
            }
        }
        $path = public_path().'/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        // return view('allForms/' . $request->form_type . '/' . $pageName, compact('invoiceData', 'requestData'));
        $pdf = PDF::loadHtml(View('allForms/'.$request->form_type.'/'.$pageName, $invoiceData))->setPaper('a4', 'portrait')->set_option('isRemoteEnabled', true);
        //    return $pdf->stream($pageName.'.pdf');
        $fileName = date('_d_m_Y_h_i_s').'.pdf';
        $pdf->save($path.'/'.$fileName);
        $response['pdf'] = asset('/uploads/mailData/'.$fileName);
        $response['message'] = 'Mail send successfully.';

        return response()->json($response, $response['status']);
    }

    // ======= USA Store Data =========
    public function usaStoreData(Request $request)
    {
        $response = (new ValidationService)->usa($request);
        if ($response['status'] == 301) {
            return response()->json($response, $response['status']);
        }

        $requestData = $request->all();
        $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'] ?? '';
        $path = public_path().'/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/'.$request->form_type.'/'.$pageName, $invoiceData)->setPaper('a4', 'portrait');
        $fileName = date('_d_m_Y_h_i_s').'.pdf';
        $pdf->save($path.'/'.$fileName);
        $invoice_id = $request->invoice_id ?? 0;
        $slip = PaySlip::find($invoice_id);
        if (! $slip) {
            $slip = new PaySlip;
            $slip->user_id = Auth::id();
            $slip->reference = 'PayStubx-'.rand(100000, 999999);
        } else {
            try {
                unlink(public_path('/uploads/mailData/'.basename($slip->pdf)));
            } catch (Exception $e) {
            }
        }
        $slip->data = json_encode($requestData);
        $slip->type = $requestData['form_type'];
        $slip->title = $requestData['cname'];
        $slip->pdf = $fileName;
        $slip->save();
        $response['type'] = $slip->type;
        $response['message'] = 'Data saved successfully successfully.';

        return response()->json($response, $response['status']);
    }

    //======invoice list ==========
    public function invoiceList(Request $request)
    {
        // return $request;
        $invoiceList = PaySlip::where(['user_id' => Auth::id()])->orderBy('id', 'desc');
        if ($request->type == 'usa' || $request->type == '') {
            $invoiceList = $invoiceList->where(['type' => $request->type ?? 'usa'])->orWhere(['type' => 'global'])->get();
        } else {
            $invoiceList = $invoiceList->where(['type' => $request->type ?? 'usa'])->get();
        }

        return view('lists.invoiceList', compact('invoiceList'));
    }

    public function invoiceDelete(Request $request, $id)
    {
        $invoice = PaySlip::find($id);
        if ($invoice) {
            try {
                unlink(public_path('/uploads/mailData/'.basename($invoice->pdf)));
            } catch (Exception $e) {
            }
            $invoice->delete();
        }

        return redirect()->back()->with('message', 'Invoice has been deleted successfully.');
    }

    public function subscription()
    {
        User::where('id', Auth::id())->update(['expiryDate' => Carbon::now()]);
        $this->invoiceMail();

        return redirect()->route('welcome')->with('message', 'Mail has been sent successfully.');
    }

    public function invoiceMail(Request $request, $id = null)
    {
        $paySlipObj = PaySlip::where(['user_id' => Auth::id()])->exists();
        if ($paySlipObj) {

            $invoice = PaySlip::where(['user_id' => Auth::id()]);
            if ($request->type != '') {
                $invoice = $invoice->where('type', $request->type);
            }
            if ($id != null) {
                $invoice = $invoice->where('id', $id);
            }
            $invoice = $invoice->orderBy('id', 'desc')->first();
            $requestData = json_decode($invoice->data);
            $requestData = collect($requestData);
            $requestData['watermark'] = 'no';
            $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'];

            $path = public_path('/uploads/mailData');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $invoiceData['requestData'] = $requestData;
            $pdf = PDF::loadView('allForms/'.$requestData['form_type'].'/'.$pageName, $invoiceData)->setPaper('a4', 'portrait');
            $fileName = date('_d_m_Y_h_i_s').'.pdf';
            $pdf->save($path.'/'.$fileName);
            if ($invoice) {
                $mailData = [
                    'email' => Auth::user()->email,
                    'title' => 'Please find attachment file',
                ];
                $moreData = [];
                $file = public_path('/uploads/mailData/'.basename($fileName));
                try {
                    Mail::send('mail.invoice_mail', $moreData, function ($message) use ($mailData, $file) {
                        $message->to($mailData['email']);
                        $message->subject($mailData['title']);
                        $message->attach($file);
                    });
                } catch (\Exception $e) {
                    $response['message'] = $e->getMessage().' Line No '.$e->getLine().' in File'.$e->getFile();
                }
            }
            if ($id != null) {
                return redirect()->route('invoiceList')->with('message', 'Mail has been sent successfully.');
            }
        } else {
            // $response['message'] = "Please choose Paystub pay slip";
            // return back()->with($response, 200);
            return redirect()->route('invoiceList')->with('message', 'Please create template first.');
        }

        return back()->with('message', 'Mail has been sent successfully.');
    }

    public function generatePDF(Request $request)
    {

        $response = (new ValidationService)->usa($request);
        if ($response['status'] == 301) {
            return response()->json($response, $response['status']);
        }
        $requestData = PaySlip::generatePDF($request);
        if ($requestData['status'] == 200) {
            $response['pdf'] = $requestData['pdf'];
            $response['success'] = true;
            $response['message'] = 'Data saved successfully';
            $response['status'] = STATUS_OK;
        }

        return response()->json($response, $response['status']);
    }

    public function deleteExtraPdf()
    {

        $path = public_path('uploads/mailData');
        $files = File::allFiles($path);
        foreach ($files as $key => $file) {
            if (! PaySlip::where('pdf', $file->getFilename())->first()) {
                if (File::delete($path.'/'.$file->getFilename())) {
                    echo "DELETED \n";
                }
            }
        }
    }
}
