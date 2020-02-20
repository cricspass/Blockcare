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
                                    Email
                                </th>
                                <th>
                                    Hospital
                                </th>
                                <th class="text-center">
                                    Action
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
                                        {{$doctor->email}}
                                    </td>
                                    <td>
                                        hbdhhjbj
                                    </td>
                                    <td class="td-actions text-center">
                                        @if ($doctor->id)
                                            {{--                                                    @if ($voter->id != auth()->id())--}}
                                            <form action="{{ route('doctor.destroy', $doctor) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('doctor.edit', $doctor) }}" data-original-title="" title="">
                                                    <i class="tim-icons icon-pencil"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this doctor?") }}') ? this.parentElement.submit() : ''">
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
