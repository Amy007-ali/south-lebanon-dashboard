@extends('layouts.app')

@section('title', 'About')

@section('content')
    <h3 class="text-2xl text-red-600 font-bold">About the Project</h3>
    <div class="bg-white p-6 rounded-xl shadow-md my-8">
        <h2 class="text-2xl font-bold mb-4">Project Objectives</h2>
        <ul class="list-disc list-inside space-y-2 text-gray-700">
            <li>Display structured village information</li>
            <li>Provide a clear monitoring dashboard</li>
            <li>Practice Laravel Blade and Tailwind CSS</li>
        </ul>
    </div>
@endsection