@props([
    'property',
    'entity',
    'label',
    'required' => false
])

<div class="form-floating">
    <input type="text" name="{{ $entity }}" id="{{ $entity }}" class="form-control" @required($required) value="{{ old($entity, $property !== null ? $property->$entity !== null ? $property->$entity : '' : '') }}">
    <label for="title" class="{{ $required ? 'required' : '' }}">{{ $label }}</label>
    @error($entity)
        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
    @enderror
</div>
