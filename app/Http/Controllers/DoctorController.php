<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Hospital;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
//        $hospital=Hospital::find(1);
//        $hospitalname=$hospital["name"];
        return view('doctors.doctors_home', compact('doctors'));

    }

    public function create()
    {
        $hospitals = Hospital::all();
        return view('doctors.doctors_create', compact('hospitals'));
    }

    public function store(Request $request, Doctor $doctor)
    {
        $doctor->name= $request->name;
        $doctor->email=$request->email;
        $doctor->hospital_id=$request->id;
        $doctor->save();
        return redirect()->route('doctor.index')->withStatus(__('Doctor successfully created.'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.doctors_edit',compact('doctor'));

    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->name = $request->get('name');
        $doctor->email = $request->get('email');
        $doctor->update();
        return redirect()->route('doctor.index')->withStatus(__('Doctor successfully created.'));
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctor.index')->withStatus(__('Doctor successfully deleted.'));
    }
}
