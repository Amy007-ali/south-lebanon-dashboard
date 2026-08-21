{{-- Resuable village information card --}}
<div class="bg-white border border-gray-200 p-6 rounded-xl shadow-md my-5">
    <h4 class="text-red-600 mb-2 font-bold">Village #{{ $loop->iteration }}</h4>
    <p class="text-xl font-bold mb-2">{{ $v['name'] }}</p>
    <p class="text-gray-600 mb-2">District: {{ $v['district'] }}</p>
    <p class="mb-2">Damaged Buildings: {{ $v['damaged_buildings'] }}</p>
    <p class="mb-2">Displaced Families: {{ $v['displaced_families'] }}</p>

    @if ($v['accessible'])
        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full font-semibold">Accessible</span>
    @else
        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full font-semibold">Currently Inaccessible</span>
    @endif

    @if ($v['damaged_buildings'] >= 150)
        <p class="mb-2">Damage Severity: Severe</p>
    @elseif ($v['damaged_buildings'] >= 100)
        <p class="mb-2">Damage Severity: High</p>
    @elseif ($v['damaged_buildings'] >= 50)
        <p class="mb-2">Damage Severity: Moderate</p>
    @else
        <p class="mb-2">Damage Severity: Low</p>
    @endif

    @if ($v['displaced_families'] >= 300)
        <p class="mb-2">Displacement Level: Critical</p>
    @elseif ($v['damaged_buildings'] >= 150)
        <p class="mb-2">Displacement Level: High</p>
    @elseif ($v['damaged_buildings'] >= 50)
        <p class="mb-2">Displacement Level: Moderate</p>
    @else
        <p class="mb-2">Displacement Level: Low</p>
    @endif
</div>