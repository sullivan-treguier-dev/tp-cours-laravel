@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>{{ $salarie === null ? __('Creation of Employee') : __('Modification of Employee') }}</h1>
        <form action="{{ $salarie === null ? route('salarie.store') : route('salarie.update', $salarie->id) }}" method="POST">
            @csrf
            @method($salarie === null ? 'POST' : 'PUT')
            <div class="d-grid gap-2 rounded-3 bg-secondary p-3 m-2">
                <div class="d-flex">
                    <div class="form-floating col-6">
                        <x-inputs.text-input :property="$salarie" entity="nom" :label="__('Last Name')" :required="true"/>
                    </div>

                    <div class="form-floating col-6">
                        <x-inputs.text-input :property="$salarie" entity="prenom" :label="__('First Name')" :required="true"/>
                    </div>
                </div>

                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $salarie === null ? '' : $salarie->email) }}">
                    <label for="email" class="required">{{ __('Email') }}</label>
                </div>
                @error('email')
                    <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                @enderror

                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control" {{ $salarie === null ? 'required' : ''}} value="{{ old('password') }}">
                    <label for="password" class="{{ $salarie === null ? 'required' : ''}}">{{ __('Password') }}</label>
                    @error('password')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <select name="role" id="role" class="form-control select2">
                        <option></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ $salarie !== null && $salarie->getRoles()[0] === $role->name ? 'selected' : ''}}>{{ $role->title }}</option>
                        @endforeach
                    </select>
                    <label for="role" class="required">{{ __('Role') }}</label>
                    @error('role')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('salarie.index') }}" class="btn btn-danger col-6 form-confirm-annuler">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-success col-6">{{ $salarie === null ? __('Create') : __('Edit') }}</button>
            </div>
        </form>
    </div>
@endsection
