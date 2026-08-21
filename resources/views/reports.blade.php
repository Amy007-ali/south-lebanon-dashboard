@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <h2 class="text-3xl font-bold mb-2">Village Reports</h2>

    <p class="text-gray-600 mb-8">View and manage reported information for affected villages.</p>

    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10">

        <div class="p-6 border-b">
            <h3 class="text-xl font-bold">Village Reports</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">Village</th>
                        <th class="p-4">District</th>
                        <th class="p-4">Damaged Buildings</th>
                        <th class="p-4">Displaced Families</th>
                        <th class="p-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($villages as $village)
                        <tr class="border-t">
                            <td class="p-4">
                                {{ $village['name'] }}
                            </td>

                            <td class="p-4">
                                {{ $village['district'] }}
                            </td>

                            <td class="p-4">
                                {{ $village['damaged_buildings'] }}
                            </td>

                            <td class="p-4">
                                {{ $village['displaced_families'] }}
                            </td>

                            <td class="p-4">
                                <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md">
        <h3 class="text-xl font-bold mb-6">Add Village Report</h3>

        <form class="space-y-4">
            <div>
                <label class="block font-medium mb-1">Village Name</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter village name">
            </div>

            <div>
                <label class="block font-medium mb-1">District</label>

                <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option>Marjayoun</option>
                    <option>Bint Jbeil</option>
                    <option>Nabatieh</option>
                    <option>Tyre</option>
                </select>
            </div>


            <div>
                <label class="block font-medium mb-1">Damaged Buildings</label>
                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
            </div>

            <div>
                <label class="block font-medium mb-1">Displaced Families</label>
                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
            </div>

            <button type="button" class="bg-gray-900 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition">Add Report</button>
        </form>
    </div>
@endsection