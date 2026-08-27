<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create(Village $village)
    {
        return view('reports.create', compact('village'));
    }


    public function store(Request $request, Village $village)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'verified' => 'required|boolean',
        ]);

        $village->reports()->create($validated);

        return redirect()
            ->route('villages.show', $village)
            ->with('success', 'Report added successfully.');
    }
}