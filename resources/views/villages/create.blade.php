@extends('layouts.app')

@section('title', 'Add Village')

@section('content')

<div class="max-w-2xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        Add Village
    </h1>


    @if ($errors->any())

        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('villages.store') }}"
          method="POST"
          class="bg-white p-6 rounded-lg shadow space-y-6">

        @csrf


        {{-- Village Information --}}

        <div>

            <h2 class="text-xl font-bold mb-4">
                Village Information
            </h2>

            <div class="space-y-4">

                <div>
                    <label class="block font-semibold mb-1">
                        Village Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        District
                    </label>

                    <input type="text"
                           name="district"
                           value="{{ old('district') }}"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Damaged Buildings
                    </label>

                    <input type="number"
                           name="damaged_buildings"
                           value="{{ old('damaged_buildings') }}"
                           min="0"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Displaced Families
                    </label>

                    <input type="number"
                           name="displaced_families"
                           value="{{ old('displaced_families') }}"
                           min="0"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Population
                    </label>

                    <input type="number"
                           name="population"
                           value="{{ old('population') }}"
                           min="0"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Accessibility
                    </label>

                    <select name="accessible"
                            class="w-full border rounded-lg px-3 py-2">

                        <option value="1"
                            {{ old('accessible') == '1' ? 'selected' : '' }}>
                            Accessible
                        </option>

                        <option value="0"
                            {{ old('accessible') == '0' ? 'selected' : '' }}>
                            Inaccessible
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Emergency Profile --}}

        <div class="border-t pt-6">

            <h2 class="text-xl font-bold mb-2">
                Emergency Profile
            </h2>

            <p class="text-gray-500 mb-4">
                Optional
            </p>

            <div class="space-y-4">

                <div>
                    <label class="block font-semibold mb-1">
                        Priority Level
                    </label>

                    <select name="priority_level"
                            class="w-full border rounded-lg px-3 py-2">

                        <option value="">No Priority</option>

                        <option value="Low"
                            {{ old('priority_level') == 'Low' ? 'selected' : '' }}>
                            Low
                        </option>

                        <option value="Medium"
                            {{ old('priority_level') == 'Medium' ? 'selected' : '' }}>
                            Medium
                        </option>

                        <option value="High"
                            {{ old('priority_level') == 'High' ? 'selected' : '' }}>
                            High
                        </option>

                    </select>
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Emergency Contact
                    </label>

                    <input type="text"
                           name="emergency_contact"
                           value="{{ old('emergency_contact') }}"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Notes
                    </label>

                    <textarea name="emergency_notes"
                              rows="3"
                              class="w-full border rounded-lg px-3 py-2">{{ old('emergency_notes') }}</textarea>
                </div>

            </div>

        </div>


        {{-- Aid Organization --}}

        <div class="border-t pt-6">

            <h2 class="text-xl font-bold mb-2">
                Aid Organization
            </h2>

            <p class="text-gray-500 mb-4">
                Optional
            </p>

            <div class="space-y-4">

                <div>
                    <label class="block font-semibold mb-1">
                        Organization Name
                    </label>

                    <input type="text"
                           name="organization_name"
                           value="{{ old('organization_name') }}"
                           class="w-full border rounded-lg px-3 py-2">
                </div>


                <div>
                    <label class="block font-semibold mb-1">
                        Organization Type
                    </label>

                    <input type="text"
                           name="organization_type"
                           value="{{ old('organization_type') }}"
                           placeholder="Example: Relief"
                           class="w-full border rounded-lg px-3 py-2">
                </div>

            </div>

        </div>


        {{-- Buttons --}}

        <div class="border-t pt-6 flex gap-3">

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                Create Village
            </button>

            <a href="{{ route('villages.index') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded-lg">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection