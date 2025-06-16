@extends($layout = 'layouts.transfer-layout')

@section('title', 'DierenAmbulance - Transfer')

@section('content')
    <div class="login-container">
        <div class="login-card">
            <h2>Please fill in the remaining info</h2>





            <form method="POST" action="{{ $mode === 'logout' ?
        route('transfer.logout') :
        route('transfer.login') }}">
                @csrf

                <div class="form-group">
                    <label for="vehicle_number">What Ambulance?<span>*</span></label>
                    <input type="text" id="vehicle_number" name="vehicle_number" required>
                </div>

                @if ($mode === 'logout')

                    <div class="form-group">
                        <label for="km_start">KM Count?<span>*</span></label>
                        <input type="text" id="km_start" name="km_start" required>
                    </div>

                    <div class="form-group">
                        <label for="cash_before">Cash Amount?<span>*</span></label>
                        <input type="text" id="cash_before" name="cash_before" required>
                    </div>


                @endif

                @if ($mode === 'login')

                    <div class="form-group">
                        <label for="km_end">KM Count?<span>*</span></label>
                        <input type="text" id="km_end" name="km_end" required>
                    </div>


                    <div class="form-group">
                        <label for="cash_after">Cash Amount?<span>*</span></label>
                        <input type="text" id="cash_after" name="cash_after" required>
                    </div>

                @endif
                
                <div class="remember-me">
                    <label>
                        <input type="hidden" value="0" name="materials_check">
                        <input type="checkbox" value="1" name="materials_check" {{ old('materials_check') ? 'checked' : '' }}> All materials
                        present?
                    </label>
                </div>

                <button class="btn-login-form" type="submit">Submit</button>

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