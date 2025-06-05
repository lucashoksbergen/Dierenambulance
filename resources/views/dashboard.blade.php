@php
    $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Dashboard')

@section('content')
 <h1>dashboard</h1>
@endsection

@push('styles')
  <!-- Page-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
  <!-- Page-specific JS if needed -->
@endpush
