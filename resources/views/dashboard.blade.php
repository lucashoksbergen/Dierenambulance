@php
  $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
@endphp

@extends($layout)

@section('title', 'DierenAmbulance - Dashboard')

@section('content')
    <h1>dashboard</h1>
    <form method="GET" action="{{ route('dashboard') }}">
    <select name="municipality">
      <option value="">All Municipalities</option>
      <option value="Springfield">Springfield</option>
      <!-- Add more -->
    </select>

    <select name="type">
      <option value="">All Types</option>
      <option value="dog">Dog</option>
      <option value="cat">Cat</option>
      <option value="bird">Bird</option>
      <option value="other">Other</option>
    </select>

    <input type="text" name="othertype" placeholder="If other, specify" />

    <select name="condition">
      <option value="">All Conditions</option>
      <option value="pet">Pet</option>
      <option value="stray">Stray</option>
      <option value="taxi">Taxi</option>
    </select>

    <input type="text" name="city" placeholder="Animal Location" />

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
      <p>Owner Name: {{ $report->animal->owner->name }}</p>
      <p>Condition:
      @foreach ($report->animal->conditions as $condition)
      {{ $condition->name }} {{  !$loop->last ? ', ' : '' }}
      @endforeach
      </p>
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