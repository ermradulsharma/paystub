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
        $basicType = Template::where(['state' => 'usa', 'type' => 'basic', 'status' => 1])->with('images')->get();
        $advanceType = Template::where(['state' => 'usa', 'type' => 'advance', 'status' => 1])->with('images')->get();
        $stateTaxes = StateTax::get();
        return view('usa', compact('basicType', 'advanceType', 'deduction', 'stateTaxes'));
    }

    public function templateGloble()
    {
        $basicType = Template::where(['state' => 'global', 'type' => 'basic', 'status' => 1])->get();
        $advanceType = Template::where(['state' => 'global', 'type' => 'advance', 'status' => 1])->get();
        return view('global', compact('basicType', 'advanceType'));
    }

    public function globlePaystub()
    {
        $deduction = Deduction::where('state', 'global')->get();
        $basicType = Template::where(['state' => 'global', 'type' => 'basic', 'status' => 1])->with('images')->get();
        $advanceType = Template::where(['state' => 'global', 'type' => 'advance', 'status' => 1])->with('images')->get();
        $stateTaxes = StateTax::get();
        return view('globalPaystub', compact('basicType', 'advanceType', 'deduction', 'stateTaxes'));
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
        //
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
