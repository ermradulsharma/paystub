<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Currency;
use App\Models\Deduction;
use App\Models\Plan;
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
        $stateTaxes = StateTax::where('country_code', 'USA')->orderBy('state')->get();
        if (Auth::check()) {
            $employerList = Address::where(['type' => 'employer', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
            $employeeList = Address::where(['type' => 'employee', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
        } else {
            $employerList = [];
            $employeeList = [];
        }

        $currencies = Currency::get();

        return view('usaPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies', 'employerList', 'employeeList'));
    }

    public function ukPayStub()
    {
        $deduction = Deduction::where('state', 'uk')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'uk', 'type' => 'basic', 'status' => 1])->get();
        $advanceType = Template::where(['state' => 'uk', 'type' => 'advance', 'status' => 1])->get();
        $stateTaxes = StateTax::where('country_code', 'UK')->orderBy('state')->get();
        $currencies = Currency::get();
        if (Auth::check()) {
            $employerList = Address::where(['type' => 'employer', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
            $employeeList = Address::where(['type' => 'employee', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
        } else {
            $employerList = [];
            $employeeList = [];
        }

        return view('ukPaystub', compact('basicType', 'advanceType', 'stateTaxes', 'deduction', 'currencies', 'employerList', 'employeeList'));
    }

    public function canadaPayStub()
    {
        $deduction = Deduction::where('state', 'canada')->orderBy('id', 'asc')->get();
        $basicType = Template::where(['state' => 'canada', 'type' => 'basic', 'status' => 1])->get();
        $advanceType = Template::where(['state' => 'canada', 'type' => 'advance', 'status' => 1])->get();
        $stateTaxes = StateTax::where('country_code', 'CA')->orderBy('state')->get();
        $currencies = Currency::get();
        if (Auth::check()) {
            $employerList = Address::where(['type' => 'employer', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
            $employeeList = Address::where(['type' => 'employee', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
        } else {
            $employerList = [];
            $employeeList = [];
        }

        return view('canadaPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies', 'employerList', 'employeeList'));
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
        $stateTaxes = StateTax::where('country_code', 'USA')->orderBy('state')->get();
        $currencies = Currency::get();
        if (Auth::check()) {
            $employerList = Address::where(['type' => 'employer', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
            $employeeList = Address::where(['type' => 'employee', 'user_id' => Auth::id()])->orderBy('id', 'DESC')->get();
        } else {
            $employerList = [];
            $employeeList = [];
        }

        return view('globalPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'currencies', 'employerList', 'employeeList'));
    }

    public function w2formPayStub()
    {
        $stateTaxes = StateTax::where('country_code', 'USA')->orderBy('state')->get();

        return view('w2paystub', compact('stateTaxes'));
    }

    public function prizing(Request $request)
    {
        $country = strtoupper($request->country ?? '');

        $plans = Plan::where(function ($query) use ($country) {
            if ($country) {
                $query->where('country', $country)
                    ->orWhere('country', '')
                    ->orWhereNull('country');
            } else {
                $query->where('country', '')
                    ->orWhereNull('country');
            }
        })->orderBy('id', 'asc')->get();

        return view('lists.prizing', compact('plans', 'country'));
    }
}
