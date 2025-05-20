@extends('layout')

@section('title', 'DierenAmbulance - Login')

@section('content')
    <div class="form-container">
        <div class="login-card">
            <h2>Please fill in the Form about the found Animal.</h2>

            <form method="POST" action="{{ route('form.submit') }}">
                @csrf

                <div class="form-group">

                    <fieldset>
                        <legend>Wat voor dier is het?<span>*</span></legend>

                        <label class="radio-row">
                            <input type="radio" name="type" value="dog" required onclick="toggleOtherField()"> Hond
                        </label>

                        <label class="radio-row">
                            <input type="radio" name="type" value="cat" onclick="toggleOtherField()"> Kat
                        </label>

                        <label class="radio-row">
                            <input type="radio" name="type" value="bird" onclick="toggleOtherField()"> Vogel
                        </label>

                        <label class="radio-row radio-other">
                            <input type="radio" name="type" value="other" onclick="toggleOtherField()"> Anders
                            <input id="otherkind" name="otherkind" placeholder="Wat voor dier..."
                                class="conditional-input" />
                        </label>
                    </fieldset>

                    @error('type')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    @error('otherkind')
                        <div class="error-message">{{ $message }}</div>
                    @enderror


                    <label for="breed">Wat voor ras is het dier?<span>*</span>
                        <input id="breed" name="breed" required>
                    </label>
                    @error('breed')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="color">Welke kleur(en) is het dier?<span>*</span>
                        <input id="color" name="color" required>
                    </label>
                    @error('color')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="gender">Welk geslacht is het?<span>*</span>
                        <select id="gender" name="gender" required>
                            <option value="male">Man</option>
                            <option value="female">Vrouw</option>
                            <option value="ex-male">Ex-Man</option>
                            <option value="unknown">Niet duidelijk</option>
                        </select>
                    </label>
                    @error('gender')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="condition">Wat voor toestand is het dier in?<span>*</span>
                        <select id="condition" name="condition" required>
                            <option value="injured">Gewond</option>
                            <option value="sick">Ziek</option>
                            <option value="stray">Zwerf</option>
                            <option value="young">Jong</option>
                            <option value="weakened">Verzwakt</option>
                            <option value="dead">Dood</option>
                            <option value="other">Anders</option>
                        </select>
                    </label>
                    @error('condition')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label for="chipnumber">Wat is het chipnummer van het dier?
                        <input id="chipnumber" name="chipnumber">
                    </label>
                    @error('chipnumber')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <fieldset>
                        <legend for="registered">Is het dier geregistreerd?<span>*</span></legend>
                        <div class="radiogroup">
                            <label for="registered_yes"><input id="registered_yes" type="radio" name="registered"
                                    value="1">Ja</label>
                            <label for="registered_no"><input id="registered_no" type="radio" name="registered"
                                    value="0">Nee</label>
                        </div>
                    </fieldset>
                    @error('registered')
                        <div class="error-message">{{ $message }}</div>
                    @enderror






                </div>

                <button class="btn-login" type="submit">Verzenden</button>

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