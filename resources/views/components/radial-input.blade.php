<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

@props([
    'label' => '',
    'name',
    'options' => [],
    'required' => false,
    'disabled' => false,
])

<div class="form-group">
    <label class="radio-group-label">
        {{ $label }}
        @if ($required)
            <span class="required">*</span>
        @endif
    </label>

    <div class="radio-group">
        @foreach ($options as $value => $text)
            <label class="radio-option">
                <input
                    type="radio"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ old($name) === $value ? 'checked' : '' }}
                    {{ $required ? 'required' : '' }}
                    {{ $disabled ? 'disabled' : '' }}
                >
                <span class="option-label">{{ $text }}</span>
            </label>
        @endforeach
    </div>

    @error($name)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
