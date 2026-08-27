@extends('layouts.app')

@section('title', 'Villages')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Village Management
        </h1>

        <a href="{{ route('villages.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Add Village
        </a>

    </div>


    @if (session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    @if ($villages->isEmpty())

        <div class="bg-white p-6 rounded-lg shadow">
            <p>No villages found.</p>
        </div>

    @else

        <div class="bg-white rounded-lg shadow overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">District</th>
                        <th class="p-3 text-left">Damaged Buildings</th>
                        <th class="p-3 text-left">Displaced Families</th>
                        <th class="p-3 text-left">Population</th>
                        <th class="p-3 text-left">Accessibility</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($villages as $village)

                        <tr class="border-t">

                            <td class="p-3">
                                {{ $village->name }}
                            </td>

                            <td class="p-3">
                                {{ $village->district }}
                            </td>

                            <td class="p-3">
                                {{ $village->damaged_buildings }}
                            </td>

                            <td class="p-3">
                                {{ $village->displaced_families }}
                            </td>

                            <td class="p-3">
                                {{ $village->population ?? 'N/A' }}
                            </td>

                            <td class="p-3">

                                @if ($village->accessible)

                                    <span class="text-green-600 font-semibold">
                                        Accessible
                                    </span>

                                @else

                                    <span class="text-red-600 font-semibold">
                                        Inaccessible
                                    </span>

                                @endif

                            </td>

                            <td class="p-3">

                                <div class="flex gap-2">

                                    <a href="{{ route('villages.show', $village) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded">
                                        View
                                    </a>

                                    <a href="{{ route('villages.edit', $village) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>


                                    <form action="{{ route('villages.destroy', $village) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</div>

@endsection