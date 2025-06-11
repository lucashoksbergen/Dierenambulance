@php
    // TODO: Before deployment, check if we should use the authenticated layout or guest layout
    // $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
    $layout = 'layouts.app'; // Force to use app layout for this form
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Finish a report')

@section('content')

 <div class="finish-report">
    <form action="" method="post">
    <header> 

        <button class="btn-cancel-report">Cancel</button> 
        <p>Finish Report - #00000</p> 
        <button class="btn-submit-report">Next</button>
    
    </header>
    

    <div class="form-section">
        <p class="form-section-title">About the Animal</p>

        <div class="form-subsection">
            <x-select-field
                name="animal"
                label="Kind of Animal"
                placeholder="Choose an animal"
                :options="[
                    'dog' => 'Dog',
                    'cat' => 'Cat',
                    'bird' => 'Bird',
                ]"
            />

            <x-input-field
                name="Breed of the animal"
                label="Breed of the animal"
                placeholder="Breed of the animal"
            />
            
            <x-input-field
                name="Color of the animal"
                label="Color of the animal"
                placeholder="Color of the animal"
            />
        </div>

        <div class="form-subsection">
        <x-radial-input
            name="gender"
            label="Gender"
            :options="[
                'male' => 'Male',
                'female' => 'Female',
                'ex-m' => 'Ex-M',
            ]"
        />

        <x-checkbox-group
            name="conditions"
            label="Condition of the animal"
            :options="[
                'sick' => 'Sick',
                'stray' => 'Stray',
                'young' => 'Young',
                'dead' => 'Dead',
                'weakened' => 'Weakened',
                'injured' => 'Injured',
                'other' => 'Other',
            ]"
            :selected="old('conditions', [])"
        />
        </div>

        <div class="form-subsection">
        <x-toggle
            name="is_registered"
            label="Is it registered?"
            :checked="old('is_registered', false)"
        />

        <x-input-field
            name="Chip Number"
            label="Chip Number"
            placeholder="Chip Number"
        />
        </div>

        <div class="form-subsection">
        <x-input-field
            name="Where is the animal registered?"
            label="Where is the animal registered?"
            placeholder="Where is the animal registered?"
        />

        <x-select-field
            name="Distination of the animal"
            label="Distination of the animal"
            placeholder="Distination of the animal"
            :options="[
                'Place 1' => 'Place 1',
                'Place 2' => 'Place 2',
                'Place 3' => 'Place 3',
                'Place 4' => 'Place 4',
            ]"
        />
        </div>

    </div>
        <div class="form-divisor"></div>

        <div class="form-section">

            <p class="form-section-title">About the Owner</p>

            <div class="form-subsection">
                <x-input-field
                   name="Name"
                   label="Name"
                   placeholder="Name"
                />
                <x-input-field
                   name="Phone Number"
                   label="Phone Number"
                   placeholder="Phone Number"
                />
                <x-input-field
                   name="Email"
                   label="Email"
                   placeholder="Email"
                />
                
            </div>
            <div class="form-subsection">
                <x-input-field
                   name="Post Code"
                   label="Post Code"
                   placeholder="Post Code"
                />
                <x-input-field
                   name="House Number"
                   label="House Number"
                   placeholder="House Number"
                />
                <x-input-field
                   name="Streat Name"
                   label="Street Name"
                   placeholder="Street Name"
                />
                <x-input-field
                   name="Place"
                   label="Place"
                   placeholder="Place"
                />
            </div>
            <div class="form-subsection">
                <x-input-field
                   name="Other Notes"
                   label="Other Notes"
                   placeholder="Other Notes"
                />
            </div>
        </div>

        <div class="form-divisor"></div>

        <div class="form-section">
            <p class="form-section-title">
                About the Report
            </p>
            <div class="form-subsection">

                <x-toggle
                    name="Is it paid?"
                    label="Is it paid?"
                    :checked="old('Is it paid?', false)"
                />

                <x-input-field
                   name="Amount"
                   label="Amount"
                   placeholder="Amount"
                />

                <x-checkbox-group
                    name="Method"
                    label="Method"
                    :options="[
                        'pin' => 'Pin',
                        'tikkie' => 'Tikkie',
                        'contant' => 'Contant',
                        'factuur' => 'Factuur',
                    ]"
                    :selected="old('conditions', [])"
                />

            </div>
        </div>

    
     </form>
 </div>

@endsection

@push('styles')
  <!-- Page-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/ambulance-form.css') }}">
  <link rel="stylesheet" href="{{ asset('css/input-field.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select-field.css') }}">
  <link rel="stylesheet" href="{{ asset('css/radial-input.css') }}">
  <link rel="stylesheet" href="{{ asset('css/checkbox-tag.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toggle.css') }}">
@endpush

@push('scripts')
  <!-- Page-specific JS if needed -->

 <script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.checkbox-toggle').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const targetId = this.dataset.toggleTarget;
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                targetEl.style.display = this.checked ? 'block' : 'none';
            }
        });
    });
});
</script>


@endpush
