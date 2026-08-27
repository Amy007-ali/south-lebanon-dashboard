@extends('layouts.app')

@section('title', 'Village Details')

@section('content')

<div class="max-w-4xl mx-auto">


    {{-- Success Message --}}

    @if (session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    {{-- Village Information --}}

    <div class="bg-white p-6 rounded-xl shadow-md mb-8">

        <h1 class="text-3xl font-bold mb-6">
            {{ $village->name }}
        </h1>

        <div class="space-y-3">

            <p>
                <span class="font-semibold">District:</span>
                {{ $village->district }}
            </p>

            <p>
                <span class="font-semibold">Population:</span>
                {{ $village->population ?? 'N/A' }}
            </p>

            <p>
                <span class="font-semibold">Damaged Buildings:</span>
                {{ $village->damaged_buildings }}
            </p>

            <p>
                <span class="font-semibold">Displaced Families:</span>
                {{ $village->displaced_families }}
            </p>

            <p>
                <span class="font-semibold">Accessibility:</span>

                @if ($village->accessible)

                    <span class="text-green-600 font-semibold">
                        Accessible
                    </span>

                @else

                    <span class="text-red-600 font-semibold">
                        Inaccessible
                    </span>

                @endif

            </p>

        </div>


        <div class="flex gap-3 mt-6">

            <a href="{{ route('villages.edit', $village) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                Edit Village
            </a>

            <a href="{{ route('villages.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg">
                Back
            </a>

        </div>

    </div>


    {{-- Emergency Profile --}}

    <div class="bg-white p-6 rounded-xl shadow-md mb-8">

        <h2 class="text-2xl font-bold mb-4">
            Emergency Profile
        </h2>

        @if ($village->emergencyProfile)

            <div class="space-y-3">

                <p>
                    <span class="font-semibold">Priority Level:</span>
                    {{ $village->emergencyProfile->priority_level }}
                </p>

                <p>
                    <span class="font-semibold">Emergency Contact:</span>
                    {{ $village->emergencyProfile->emergency_contact ?? 'N/A' }}
                </p>

                <p>
                    <span class="font-semibold">Notes:</span>
                    {{ $village->emergencyProfile->notes ?? 'No notes available.' }}
                </p>

            </div>

        @else

            <p class="text-gray-500">
                No emergency profile available.
            </p>

        @endif

    </div>


    {{-- Aid Organizations --}}

    <div class="bg-white p-6 rounded-xl shadow-md mb-8">

        <h2 class="text-2xl font-bold mb-4">
            Aid Organizations
        </h2>

        @forelse ($village->aidOrganizations as $organization)

            <div class="border rounded-lg p-4 mb-3">

                <h3 class="font-bold">
                    {{ $organization->name }}
                </h3>

                <p class="text-gray-600">
                    Type: {{ $organization->type ?? 'N/A' }}
                </p>

            </div>

        @empty

            <p class="text-gray-500">
                No aid organizations assigned.
            </p>

        @endforelse

    </div>


    {{-- Reports --}}

    <div class="bg-white p-6 rounded-xl shadow-md mb-8">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-2xl font-bold">
                Reports
            </h2>

            <a href="{{ route('villages.reports.create', $village) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                + Add Report
            </a>

        </div>


        @forelse ($village->reports as $report)

            <div class="border rounded-lg p-4 mb-4">

                <h3 class="text-lg font-bold mb-2">
                    {{ $report->title }}
                </h3>

                <p class="text-gray-600 mb-2">
                    {{ $report->description }}
                </p>

                <p>
                    <span class="font-semibold">Verified:</span>

                    @if ($report->verified)

                        <span class="text-green-600 font-semibold">
                            Yes
                        </span>

                    @else

                        <span class="text-red-600 font-semibold">
                            No
                        </span>

                    @endif

                </p>

            </div>

        @empty

            <p class="text-gray-500">
                No reports available for this village.
            </p>

        @endforelse

    </div>

</div>

@endsection