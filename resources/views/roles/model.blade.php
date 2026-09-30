@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>{{ $role === null ? __('Creation of Role') : __('Modification of Role') }}</h1>
        <form action="{{ $role === null ? route('role.store') : route('role.update', $role->id) }}" method="POST">
            @csrf
            @method($role === null ? 'POST' : 'PUT')
            <div class="d-grid gap-2 rounded-3 bg-secondary p-3 m-2">
                <div class="d-flex">
                    <div class="col-12">
                        <x-inputs.text-input :property="$role" entity="title" :label="__('Title')" :required="true"/>
                    </div>
                </div>
                <div class="bg-white rounded-3 gap-5 p-2">
                    @foreach ($abilities as $i => $ability)
                        @if ($i % 4 === 0)
                            <div class="d-flex justify-content-between">
                        @endif
                            <div class="form-check form-switch">
                                <input type="checkbox" name="abilities[]" id="abilities.{{ $i }}" value="{{ $ability->name }}" class="form-check-input" role="switch" @checked(in_array($ability->name, $verifAbilities))>
                                <label class="form-check-label" for="abilities.{{ $i }}">{{ $ability->title }}</label>
                            </div>
                        @if ($i % 4 === 3 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('role.index') }}" class="btn btn-danger col-6 form-confirm-annuler">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-success col-6">{{ $role === null ? __('Create') : __('Edit') }}</button>
            </div>
        </form>
    </div>
@endsection
