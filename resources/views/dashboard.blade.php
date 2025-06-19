@php
  $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Dashboard')

@section('content')
  <h1>Dashboard</h1>

  <form method="GET" action="{{ route('dashboard') }}">
    <input type="text" name="municipality" placeholder="Gemeente ..." />

    <select name="animaltype">
    <option value="">Alle Diersoorten</option>
    <option value="dog">Hond</option>
    <option value="cat">Kat</option>
    <option value="bird">Vogel</option>
    <option value="other">Anders
      <input type="text" name="othertype" placeholder="Als anders ..." />
    </option>
    </select>
    <select name="reporttype">
    <option value="">Alle melding types</option>
    <option value="pet">Huisdier</option>
    <option value="stray">Zwerf</option>
    <option value="taxi">Taxi</option>
    </select>

    <input type="text" name="city" placeholder="Locatie van het dier" />

    <input type="date" name="date" />

    <select name="status">
    <option value="">Alle Statusen</option>
    <option value="open">Open</option>
    <option value="closed">Gesloten</option>
    <option value="in_progress">Bezig</option>
    </select>

    <button type="submit">Filter</button>
    
  </form>

  @isset($reports)
    @if ($reports->count())
    @foreach ($reports as $report)
    <p>Diersoort: {{ $report->animal->type }}</p>
    <p>Type melding: {{ $report->type }}</p>
    <p>Conditie:
    @foreach ($report->animal->conditions as $condition)
    {{ $condition->name }}{{ !$loop->last ? ', ' : '' }}
    @endforeach
    </p>
    <p>Chauffeurs:
    @foreach ($report->userVehicles as $driver)
    {{ $driver->user->name }}{{ !$loop->last ? ', ' : '' }}
    @endforeach
    </p>
    <p>Gemeente: {{ $report->animal->owner->municipality }}</p>
    <p>Status Melding: {{ $report->report_status }}</p>
    <br>
    @endforeach

    {{-- Pagination links --}}
    {{ $reports->links('vendor.pagination.default') }}
    @else
    <p>No reports found.</p>
    @endif
    @endisset

 

@endsection
@push('styles')
  <!-- Page-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
@push('scripts')
  <!-- Page-specific JS if needed -->
@endpush