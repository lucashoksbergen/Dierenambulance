@php
    $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Login')

@section('content')
<div class="login-container">
    <div class="login-card">
        <h2>Welkom terug!</h2>
        
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email adres<span>*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group">
              <label for="password">Wachtwoord<span>*</span></label>
              <input type="password" id="password" name="password" required>
            </div>

            <div class="remember-me">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Gegevens onthouden
                </label>
            </div>

            <button class="btn-login-form" type="submit">Inloggen</button>

            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
            </div>

            <p><a href="https://dierenambulancefrl.nl/word-vrijwilliger/">Nog niet een vrijwilliger? Sluit je hier bij ons aan.</a></p>

            @if ($errors->any())
             <ul>
                @foreach ($errors->all() as $error)
                    <li class="error-message">{{ $error }}</li>
                @endforeach
             </ul>
            @endif

        </form>

    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@push('scripts')
<script>
</script>
@endpush