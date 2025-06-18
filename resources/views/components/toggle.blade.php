@props([
    'label' => '',
    'name',
    'checked' => false,
])

@php
    $id = $name . '_toggle';
@endphp

<div class="form-group toggle-group">
    @if($label)
        <label for="{{ $id }}" class="toggle-label">
            {{ $label }}
        </label>
    @endif

    <div class="toggle-wrapper">
        <span class="toggle-text">No</span>

        <label class="switch">
            <input type="checkbox" id="{{ $id }}" name="{{ $name }}" {{ $checked ? 'checked' : '' }}>
            <span class="slider"></span>
        </label>

        <span class="toggle-text">Yes</span>
    </div>
</div>
