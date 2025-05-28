@php
    $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Welcome')

@section('content')
 <h1>welcome</h1>
@endsection

@push('styles')
  <!-- Page-specific CSS -->
  <!-- <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> -->
@endpush

@push('scripts')
  <!-- Page-specific JS if needed -->
@endpush
