@props([
    'label' => '',
    'name',
    'value' => '',
    'checked' => false,
])

@php
    $id = $name . '_' . Str::slug($value);
@endphp

<label for="{{ $id }}" class="checkbox-tag">
    <input
        type="checkbox"
        name="{{ $name }}[]"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
    >
    <span class="checkbox-box">
        <svg viewBox="0 0 24 24" class="check-icon" fill="none" stroke="white" stroke-width="3">
            <polyline points="5 13 9 17 19 7" />
        </svg>
    </span>
    <span class="checkbox-label">{{ $label }}</span>
</label>
