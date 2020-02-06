@extends('layouts.app', ['page' => __('PATIENTS'), 'pageSlug' => 'patient'])


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> List Of All Patients</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('patient.create') }}" class="btn btn-sm btn-primary">{{ __('Add Patient') }}</a>
                                </div>
                            </div>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    City
                                </th>
                                <th class="text-center">
                                    Salary
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>
                                        {{$patient->id}}
                                        {{--                                    {{ $doctor->name }}--}}
                                    </td>
                                    <td>
                                        {{$patient->name}}
                                    </td>
                                    <td>

                                    </td>
                                    <td class="text-center">
                                        $36,738
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
