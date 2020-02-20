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
                                    Email
                                </th>
                                <th>
                                    Public Key
                                </th>
                                <th class="text-center">
                                    Action
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
                                        {{$patient->email}}
                                    </td>
                                    <td style=" width: 40em">
                                        <p style="overflow-x: auto; white-space: nowrap; width: 40em; -webkit-overflow-scrolling:   ">
                                            {{ $patient->public_key }}
                                        </p>
                                    </td>
                                    <td class="td-actions text-right">
                                        @if ($patient->id)
                                            {{--                                                    @if ($voter->id != auth()->id())--}}
                                            <form action="{{ route('patient.destroy', $patient) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('patient.edit', $patient) }}" data-original-title="" title="">
                                                    <i class="tim-icons icon-pencil"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Patient?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-trash-simple"></i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        @else
                                            <a rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-center">

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
