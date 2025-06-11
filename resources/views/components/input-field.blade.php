<!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->

@props([
    'label' => '',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'icon' => null,
    'verifying' => false,
    'disabled' => false,
])

@php
    $hasError = $errors->has($name);
@endphp

<div class="form-group {{ $disabled ? 'is-disabled' : '' }} {{ $hasError ? 'has-error' : '' }} {{ $verifying ? 'is-verifying' : '' }}">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($required)
            <span class="required">*</span>
        @endif
    </label>

    <div class="input-wrapper">
        @if ($icon)
            <span class="icon">{!! $icon !!}</span>
        @endif

        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name) }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="input-field"
        >
    </div>

    @if ($verifying)
        <p class="verifying-message">✨ Verifying</p>
    @endif

    @error($name)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
