@extends('layout')

@section('title', 'DierenAmbulance - Login')

@section('content')
    <div class="form-container">
        <div class="login-card">
            <h2>Please fill in the Form about the found Animal.</h2>


            <form method="POST" action="{{ route('form') }}">
                @csrf

                <div class="form-group">
                    <label for="kind">What kind of animal is it?<span>*</span>
                        <select id="kind" name="kind" required>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Bird">Bird</option>
                            <option value="Other">Other</option>
                        </select>
                    </label>


                    <label id="otherlabel" for="otherkind" style="color: gray;">If other is selected, what kind of animal is it?
                        <input id="otherkind" name="otherkind" disabled>
                    </label>

                    <label for="breed">What breed is it?<span>*</span>
                        <input id="breed" name="breed" required>
                    </label>

                    <label for="color">What color is it?<span>*</span>
                        <input id="color" name="color" required>
                    </label>

                    <label for="gender">What gender is it?<span>*</span>
                        <select id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Ex-Male">Ex-Male</option>
                            <option value="Cannot Tell">Cannot Tell</option>
                        </select>
                    </label>

                    <label for="condition">What condition is it in?<span>*</span>
                        <select id="condition" name="condition" required>
                            <option value="Injured">Injured</option>
                            <option value="Sick">Sick</option>
                            <option value="Stray">Stray</option>
                            <option value="Young">Young</option>
                            <option value="Weakened">Weakened</option>
                            <option value="Dead">Dead</option>
                            <option value="Other">Other</option>
                        </select>
                    </label>

                    <label for="chipnumber">What is its chipnumber?
                        <input id="chipnumber" name="chipnumber">
                    </label>

                    <fieldset>
                        <legend for="registered">Is it registered?<span>*</span></legend>
                        <div class="radiogroup">
                            <label for="registered_yes"><input id="registered_yes" type="radio" name="registered"
                                    value="yes">Yes</label>
                            <label for="registered_no"><input id="registered_no" type="radio" name="registered"
                                    value="no">No</label>
                        </div>
                    </fieldset>

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