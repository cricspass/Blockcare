<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.doctors_home', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.doctors_create');
    }

    public function store(Request $request, Doctor $doctor)
    {
        $doctor->create($request->all());
        return redirect()->route('doctor.index')->withStatus(__('Doctor successfully created.'));
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
