<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use App\Models\PaySlip;
use App\Models\StateTax;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deduction = Deduction::where('state', 'usa')->get();
        $basicType = Template::where('type', 'basic')->with('images')->get();
        $advanceType = Template::where('type', 'advance')->with('images')->get();
        $stateTaxes = StateTax::get();
        return view('usa', compact('basicType', 'advanceType', 'deduction', 'stateTaxes'));
    }

    public function templateGloble()
    {
        $basicType = Template::where('type', 'basic')->get();
        $advanceType = Template::where('type', 'advance')->get();
        return view('globle', compact('basicType', 'advanceType'));
    }

    public function prizing(Request $request)
    {
        return view('lists.prizing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoiceData = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $id])->first() ?? [];
        $deduction = Deduction::where('state', 'usa')->orderBy('id', 'asc')->get();
        $basicType = Template::where('type', 'basic')->with('images')->get();
        $advanceType = Template::where('type', 'advance')->with('images')->get();
        $stateTaxes = StateTax::get();
        return view('lists.usaEdit', compact('basicType', 'advanceType', 'deduction', 'stateTaxes', 'invoiceData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
