<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Deduction;
use App\Models\PaySlip;
use App\Models\StateTax;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayStubController extends Controller
{
    public function usaPayStub()
    {
        $deduction = Deduction::where('state', 'usa')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'usa', 'type' => 'basic', 'status' => 1])->orderBy('title')->with('images')->get();
        $advanceType = Template::where(['state' => 'usa', 'type' => 'advance', 'status' => 1])->orderBy('title')->with('images')->get();
        $stateTaxes = StateTax::orderBy('state')->get();
        $currencies = Currency::get();
        return view('usaPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies'));
    }

    public function ukPayStub()
    {
        $deduction = Deduction::where('state', 'uk')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'uk', 'type' => 'basic', 'status' => 1])->orderBy('title')->get();
        $advanceType = Template::where(['state' => 'uk', 'type' => 'advance', 'status' => 1])->orderBy('title')->get();
        $stateTaxes = StateTax::orderBy('state')->get();
        $currencies = Currency::get();
        return view('ukPaystub', compact('basicType', 'advanceType', 'stateTaxes', 'deduction', 'currencies'));
    }

    public function canadaPayStub()
    {
        $deduction = Deduction::where('state', 'canada')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'canada', 'type' => 'basic', 'status' => 1])->orderBy('title')->get();
        $advanceType = Template::where(['state' => 'canada', 'type' => 'advance', 'status' => 1])->orderBy('title')->get();
        $stateTaxes = StateTax::orderBy('state')->get();
        $currencies = Currency::get();
        return view('canadaPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies'));
    }

    public function templateGlobal()
    {
        $basicType = Template::where(['state' => 'global', 'type' => 'basic', 'status' => 1])->orderBy('title')->get();
        $advanceType = Template::where(['state' => 'global', 'type' => 'advance', 'status' => 1])->orderBy('title')->get();
        return view('global', compact('basicType', 'advanceType'));
    }

    public function globlePaystub()
    {
        $deduction = Deduction::where('state', 'global')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'global', 'type' => 'basic', 'status' => 1])->orderBy('title')->with('images')->get();
        $advanceType = Template::where(['state' => 'global', 'type' => 'advance', 'status' => 1])->orderBy('title')->with('images')->get();
        $stateTaxes = StateTax::orderBy('state')->get();
        $currencies = Currency::get();
        return view('globalPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies'));
    }

    public function w2formPayStub()
    {
        $stateTaxes = StateTax::orderBy('state')->get();
        return view('w2paystub', compact('stateTaxes'));
    }

    public function prizing(Request $request)
    {
        return view('lists.prizing');
    }
}
