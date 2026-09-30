@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>{{ $ability === null ? __('Creation of Ability') : __('Modification of Ability') }}</h1>
        <form action="{{ $ability === null ? route('ability.store') : route('ability.update', $ability->id) }}" method="POST">
            @csrf
            @method($ability === null ? 'POST' : 'PUT')
            <div class="d-grid gap-2 rounded-3 bg-secondary p-3 m-2">
                <div class="d-flex">
                    <div class="form-floating col-12">
                        <x-inputs.text-input :property="$ability" entity="title" :label="__('Title')" :required="true"/>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('ability.index') }}" class="btn btn-danger col-6 form-confirm-annuler">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-success col-6">{{ $ability === null ? __('Create') : __('Edit') }}</button>
            </div>
        </form>
    </div>
@endsection
