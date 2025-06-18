@props([
    'label' => '',
    'name',
    'options' => [],
    'required' => false,
    'selected' => [],
])

@php
    $selected = old($name, $selected ?? []);
    $otherName = $name . '_other';
    $otherChecked = in_array('other', $selected);
@endphp

<div class="form-group">
    @if($label)
        <label class="checkbox-group-label">
            {{ $label }}
            @if ($required)
                <span class="required">*</span>
            @endif
        </label>
    @endif

    <div class="checkbox-group" >
        @foreach ($options as $value => $text)
            @php
                $id = $name . '_' . \Str::slug($value);
                $isOther = $value === 'other';
            @endphp

            <label for="{{ $id }}" class="checkbox-tag">
                <input
                    type="checkbox"
                    name="{{ $name }}[]"
                    id="{{ $id }}"
                    value="{{ $value }}"
                    class="checkbox-toggle"
                    data-toggle-target="toggle-{{ $id }}"
                    {{ in_array($value, $selected) ? 'checked' : '' }}
                >
                <span class="checkbox-box">
                    <svg viewBox="0 0 24 24" class="check-icon" fill="none" stroke="white" stroke-width="3">
                        <polyline points="5 13 9 17 19 7" />
                    </svg>
                </span>
                <span class="checkbox-label">{{ $text }}</span>
            </label>
        @endforeach
    </div>

    <div
        id="toggle-{{ $name . '_other' }}"
        class="toggle-other-input"
        style="margin-top: 12px; display: {{ $otherChecked ? 'block' : 'none' }};"
    >
        <x-input-field
            :name="$otherName"
            placeholder="Describe other"
            :value="old($otherName)"
        />
    </div>

    @error($name)
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>
