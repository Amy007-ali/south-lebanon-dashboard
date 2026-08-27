@extends('layouts.app')

@section('title', 'Add Report')

@section('content')

<div class="max-w-2xl mx-auto">

    <h1 class="text-3xl font-bold mb-2">
        Add Report
    </h1>

    <p class="text-gray-600 mb-6">
        Village: {{ $village->name }}
    </p>


    @if ($errors->any())

        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('villages.reports.store', $village) }}"
          method="POST"
          class="bg-white p-6 rounded-lg shadow space-y-4">

        @csrf


        <div>

            <label class="block font-semibold mb-1">
                Report Title
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full border rounded-lg px-3 py-2">

        </div>


        <div>

            <label class="block font-semibold mb-1">
                Description
            </label>

            <textarea name="description"
                      rows="4"
                      class="w-full border rounded-lg px-3 py-2">{{ old('description') }}</textarea>

        </div>


        <div>

            <label class="block font-semibold mb-1">
                Verified
            </label>

            <select name="verified"
                    class="w-full border rounded-lg px-3 py-2">

                <option value="0"
                    {{ old('verified') == '0' ? 'selected' : '' }}>
                    No
                </option>

                <option value="1"
                    {{ old('verified') == '1' ? 'selected' : '' }}>
                    Yes
                </option>

            </select>

        </div>


        <div class="flex gap-3 pt-2">

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                Add Report
            </button>

            <a href="{{ route('villages.show', $village) }}"
               class="bg-gray-500 text-white px-5 py-2 rounded-lg">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection