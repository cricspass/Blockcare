<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    public function index()
    {
        $hospitals = Hospital::all();

        return view('hospitals.hospitals_home',compact('hospitals'));
    }


    public function create()
    {
        return view('hospitals.hospitals_create');

    }


    public function store(Request $request,Hospital $hospital)
    {
        $hospital->name= $request->name;
        $hospital->address=$request->address;
        $hospital->save();
        return redirect()->route('hospital.index')->withStatus(__('hospital successfully created.'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Hospital $hospital)
    {
        return view('hospitals.hospitals_edit',compact('hospital'));
    }


    public function update(Request $request, Hospital $hospital)
    {
        $hospital->name = $request->get('name');
        $hospital->address = $request->get('address');
        $hospital->update();
        return redirect()->route('hospital.index')->withStatus(__('hospital successfully created.'));
    }


    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('hospital.index')->withStatus(__('hospital successfully deleted.'));
    }
}
