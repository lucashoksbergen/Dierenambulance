@extends('layout')

@section('title', 'DierenAmbulance - Login')

@section('content')
    <div class="form-container">
        <div class="login-card">
            <h2>Please fill in the Form about the found Animal.</h2>

            <form method="POST" action="{{ route('form.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="kind">What kind of animal is it?<span>*</span>
                        <select id="type" name="type" required>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="bird">Bird</option>
                            <option value="other">Other</option>
                        </select>
                    </label>
                    @error('type')
                        <div class="error-message">{{ $message }}</div>
                    @enderror


                    <label id="otherlabel" for="otherkind" style="color: gray;">If other is selected, what kind of animal is
                        it?<span id="animalspan"></span>
                        <input id="otherkind" name="otherkind" disabled style="color: gray;">
                    </label>
                    @error('otherkind')
                        <div class="error-message">{{ $message }}</div>
                    @enderror



                    <label for="breed">What breed is it?<span>*</span>
                        <input id="breed" name="breed" required>
                    </label>
                    @error('breed')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="color">What color is it?<span>*</span>
                        <input id="color" name="color" required>
                    </label>
                    @error('color')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="gender">What gender is it?<span>*</span>
                        <select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="ex-male">Ex-Male</option>
                            <option value="unknown">Cannot Tell</option>
                        </select>
                    </label>
                    @error('gender')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="condition">What condition is it in?<span>*</span>
                        <select id="condition" name="condition" required>
                            <option value="injured">Injured</option>
                            <option value="sick">Sick</option>
                            <option value="stray">Stray</option>
                            <option value="young">Young</option>
                            <option value="weakened">Weakened</option>
                            <option value="dead">Dead</option>
                            <option value="other">Other</option>
                        </select>
                    </label>
                    @error('condition')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="chipnumber">What is its chipnumber?
                        <input id="chipnumber" name="chipnumber">
                    </label>
                    @error('chipnumber')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <fieldset>
                        <legend for="registered">Is it registered?<span>*</span></legend>
                        <div class="radiogroup">
                            <label for="registered_yes"><input id="registered_yes" type="radio" name="registered"
                                    value="1">Yes</label>
                            <label for="registered_no"><input id="registered_no" type="radio" name="registered"
                                    value="0">No</label>
                        </div>
                    </fieldset>
                    @error('registered')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                </div>

                <button class="btn-login" type="submit">Submit</button>

            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/form.js') }}"></script>
@endpush