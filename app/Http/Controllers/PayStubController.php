<?php

namespace App\Http\Controllers;

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
        $basicType = Template::where(['state' => 'usa', 'type' => 'basic', 'status' => 1])->with('images')->get();
        $advanceType = Template::where(['state' => 'usa', 'type' => 'advance', 'status' => 1])->with('images')->get();
        $stateTaxes = StateTax::get();
        return view('usaPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes'));
    }

    public function ukPayStub()
    {
        $basicType = Template::where('type', 'basic')->get();
        $advanceType = Template::where('type', 'advance')->get();
        $stateTaxes = StateTax::get();
        return view('ukPaystub', compact('basicType', 'advanceType', 'stateTaxes'));
    }

    public function canadaPayStub()
    {
        $deduction = Deduction::where('state', 'canada')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'canada', 'type' => 'basic', 'status' => 1])->get();
        $advanceType = Template::where(['state' => 'canada', 'type' => 'advance', 'status' => 1])->get();
        $stateTaxes = StateTax::get();
        return view('canadaPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes'));
    }

    public function templateGlobal()
    {
        $basicType = Template::where(['state' => 'global', 'type' => 'basic', 'status' => 1])->get();
        $advanceType = Template::where(['state' => 'global', 'type' => 'advance', 'status' => 1])->get();
        return view('global', compact('basicType', 'advanceType'));
    }

    public function globlePaystub()
    {
        $deduction = Deduction::where('state', 'global')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'global', 'type' => 'basic', 'status' => 1])->with('images')->get();
        $advanceType = Template::where(['state' => 'global', 'type' => 'advance', 'status' => 1])->with('images')->get();
        $stateTaxes = StateTax::get();
        return view('globalPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes'));
    }

    public function prizing(Request $request)
    {
        return view('lists.prizing');
    }
}
