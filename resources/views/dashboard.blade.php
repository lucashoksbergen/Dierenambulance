@php
    $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Dashboard')

@section('content')

<h1>Dashboard</h1>

<div>
  <div>
    <div>
      <div>#0000</div><div>-</div><div>Taxirit/Zwerfdier</div>
    </div>
    <div>Status</div>
  </div>
  <div>
    <div>
      <div class="information"><div>Diersoort:</div><div>Diersoort</div></div>
      <div class="information"><div>Datum:</div><div>00/00/00 @ 00:00</div></div>
    </div>
    <div>
      <div class="information"><div>Locatie:</div><div>Locatie</div></div>
      <div class="information"><div>Gemeente:</div><div>Gemeente</div></div>
    </div>
    <div>
      <div class="information"><div>Bestuurder:</div><div>Bestuurder</div></div>
      <div class="information"><div>Bijrijder:</div><div>Bijrijder</div></div>
    </div>
  </div>
</div>


@endsection

@push('styles')
  <!-- Page-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
  <!-- Page-specific JS if needed -->
@endpush
