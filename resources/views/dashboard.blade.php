@php
$layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <form method="GET" action="{{ route('dashboard') }}">
      <!-- Eventually replace this with dynamic dropdown -->
      <input type="text" name="municipality" placeholder="Municipality ..." />

      <select name="animaltype">
      <option value="">All Animal Types</option>
      <option value="dog">Dog</option>
      <option value="cat">Cat</option>
      <option value="bird">Bird</option>
      <option value="other">Other
        <input type="text" name="othertype" placeholder="If other ..." />
      </option>
      </select>
      <select name="reporttype">
      <option value="">All Report Types</option>
      <option value="pet">Pet</option>
      <option value="stray">Stray</option>
      <option value="taxi">Taxi</option>
      </select>

      <input type="text" name="city" placeholder="Location of Animal" />

      <input type="date" name="date" />

      <select name="status">
      <option value="">All Statuses</option>
      <option value="open">Open</option>
      <option value="closed">Closed</option>
      <option value="in_progress">In Progress</option>
      </select>

      <button type="submit">Filter</button>
    </form>
    @isset($reports)
      @if ($reports->count())
      @foreach ($reports as $report)
      <p>Animal Type: {{ $report->animal->type }}</p>
      <p>Report Type: {{ $report->type }}</p>
      <p>Condition:
      @foreach ($report->animal->conditions as $condition)
      {{ $condition->name }} {{  !$loop->last ? ', ' : '' }}
      @endforeach
      </p>
      <p>Drivers:
      @foreach ($report->userVehicles as $driver)
      {{ $driver->user->name}} {{ !$loop->last ? ', ' : '' }}
      @endforeach
      </p>
      <p>Municipality: {{ $report->animal->owner->municipality}}</p>
      <p>Report Status: {{ $report->report_status}}</p>

      <br>
      @endforeach
      @endif
    @endisset
  @endsection
  @push('styles')
    <!-- Page-specific CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
  @endpush
  @push('scripts')
    <!-- Page-specific JS if needed -->
  @endpush