<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

@props([
    'label' => '',
    'name',
    'required' => false,
    'options' => [],
    'placeholder' => 'Select from the list below',
    'disabled' => false,
])

@php
    $hasError = $errors->has($name);
@endphp

<div class="form-group {{ $hasError ? 'has-error' : '' }} {{ $disabled ? 'is-disabled' : '' }}">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($required)
            <span class="required">*</span>
        @endif
    </label>

    <div class="select-wrapper">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="select-field"
        >
            <option value="" disabled selected hidden>{{ $placeholder }}</option>
            @foreach ($options as $value => $text)
                <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>
                    {{ $text }}
                </option>
            @endforeach
        </select>
        <span class="select-icon">⌄</span>
    </div>

    @error($name)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
