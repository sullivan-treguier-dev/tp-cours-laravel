@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h1>{{ __('List of roles') }}</h1>
            @can('salarie-create')
                <a href="{{ route('role.create') }}" class="btn btn-primary me-2">{{ __('Add role') }}</a>
            @endcan
        </div>
        @if(session('success'))
            <div class="border border-success border-3 rounded-3 text-success fw-bold bg-success bg-opacity-25 p-3">{{ session('success') }}</div>
        @endif
        <div class="d-grid rounded-3 bg-primary p-3 m-2 gap-3">
            @if($roles->count() <= 0)
                <div class="d-flex justify-content-between align-items-center border rounded-3 bg-white p-2">
                    {{ __('There is no role in this list') }}
                </div>
            @else
                @foreach ($roles as $role)
                    <div class="d-flex justify-content-between align-items-center border rounded-3 bg-white px-2">
                        <div class="d-block">
                            <h2>{{ $role->title }}</h2>
                        </div>
                        <div class="d-flex flex-nowrap gap-1">
                            @can('salarie-show')
                                <a href="{{ route('role.show', $role->id) }}" class="btn btn-dark"><i class="bi bi-eye"></i></a>
                            @endcan
                            @can('salarie-edit')
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                            @endcan
                            @can('salarie-delete')
                                <form action="{{ route('role.destroy', $role->id) }}" method="post" class="form-confirm-supprimer-role" data-role="{{ $role->title }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
