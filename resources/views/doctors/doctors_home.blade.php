@extends('layouts.app', ['page' => __('DOCTORS'), 'pageSlug' => 'doctor'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> List Of All Doctors</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('doctor.create') }}" class="btn btn-sm btn-primary">{{ __('Add Doctor') }}</a>
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
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>
                                        {{$doctor->id}}
                                        {{--                                    {{ $doctor->name }}--}}
                                    </td>
                                    <td>
                                        {{$doctor->name}}
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
