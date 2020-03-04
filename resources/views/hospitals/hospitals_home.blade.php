@extends('layouts.app', ['page' => __('HOSPITALS'), 'pageSlug' => 'hospital'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> List Of All Hospitals</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('hospital.create') }}" class="btn btn-sm btn-primary">{{ __('Add hospital') }}</a>
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
                                    Address
                                </th>
                                <th>
                                    Number Of Doctots
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hospitals as $hospital)
                                <tr>
                                    <td>
                                        {{$hospital->id}}
                                        {{--                                    {{ $hospital->name }}--}}
                                    </td>
                                    <td>
                                        {{$hospital->name}}
                                    </td>
                                    <td>
                                        {{$hospital->address}}
                                    </td>
                                    <td>
                                        {{$hospital->doctors_count}}
                                    </td>
                                    <td class="td-actions text-center">
                                        @if ($hospital->id)
                                            {{--                                                    @if ($voter->id != auth()->id())--}}
                                            <form action="{{ route('hospital.destroy', $hospital) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('hospital.edit', $hospital) }}" data-original-title="" title="">
                                                    <i class="tim-icons icon-pencil"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this hospital?") }}') ? this.parentElement.submit() : ''">
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
