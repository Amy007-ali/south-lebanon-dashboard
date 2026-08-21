{{-- List of monitored South Lebanon Villages --}}

@extends('layouts.app')

@section('title', 'Affected Villages')

@section('content')
    
    <h3 class="text-3xl font-bold">Affected Villages of South Lebanon</h3>
    <p class="text-gray-600 mt-2">Reported impact information for monitored southern villages.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($villages as $v)
        @include('partials.village-card', [
            'v' => $v 
        ])
        @empty
            <p>No affected villages are currently available</p>
        @endforelse
    </div>
@endsection