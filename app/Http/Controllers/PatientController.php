<?php

namespace App\Http\Controllers;

use App\Patient;
use Blockavel\LaraBlockIo\LaraBlockIo;
use BlockIo;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $block = new LaraBlockIo();
        ($block->getAddresses());
        $patients = Patient::all();
        return view('patients.patients_home', compact('patients'));
    }


    public function create()
    {
        return view('patients.patients_create');
    }


    public function store(Request $request,Patient $patient)
    {
        $patient->create($request->all());
        return redirect()->route('patient.index')->withStatus(__('Patient successfully created.'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
