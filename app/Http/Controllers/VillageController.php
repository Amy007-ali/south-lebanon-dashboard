<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\AidOrganization;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index()
    {
        $villages = Village::all();

        return view('villages.index', compact('villages'));
    }


    public function create()
    {
        return view('villages.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            // Village
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'damaged_buildings' => 'required|integer|min:0',
            'displaced_families' => 'required|integer|min:0',
            'population' => 'nullable|integer|min:0',
            'accessible' => 'required|boolean',

            // Emergency Profile
            'priority_level' => 'nullable|in:Low,Medium,High',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_notes' => 'nullable|string',

            // Aid Organization
            'organization_name' => 'nullable|string|max:255',
            'organization_type' => 'nullable|string|max:255',
        ]);


        // Create Village
        $village = Village::create([
            'name' => $validated['name'],
            'district' => $validated['district'],
            'damaged_buildings' => $validated['damaged_buildings'],
            'displaced_families' => $validated['displaced_families'],
            'population' => $validated['population'] ?? null,
            'accessible' => $validated['accessible'],
        ]);


        // Create Emergency Profile if entered
        if (!empty($validated['priority_level'])) {

            $village->emergencyProfile()->create([
                'priority_level' => $validated['priority_level'],
                'emergency_contact' => $validated['emergency_contact'] ?? null,
                'notes' => $validated['emergency_notes'] ?? null,
            ]);
        }


        // Create Aid Organization if entered
        if (!empty($validated['organization_name'])) {

            $organization = AidOrganization::create([
                'name' => $validated['organization_name'],
                'type' => $validated['organization_type'] ?? null,
            ]);

            $village->aidOrganizations()->attach($organization->id);
        }


        return redirect()
            ->route('villages.index')
            ->with('success', 'Village added successfully.');
    }


    public function show(Village $village)
    {
        $village->load([
            'reports',
            'emergencyProfile',
            'aidOrganizations',
        ]);

        return view('villages.show', compact('village'));
    }


    public function edit(Village $village)
    {
        $village->load([
            'emergencyProfile',
            'aidOrganizations',
        ]);

        return view('villages.edit', compact('village'));
    }


    public function update(Request $request, Village $village)
    {
        $validated = $request->validate([
            // Village
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'damaged_buildings' => 'required|integer|min:0',
            'displaced_families' => 'required|integer|min:0',
            'population' => 'nullable|integer|min:0',
            'accessible' => 'required|boolean',

            // Emergency Profile
            'priority_level' => 'nullable|in:Low,Medium,High',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_notes' => 'nullable|string',

            // Aid Organization
            'organization_name' => 'nullable|string|max:255',
            'organization_type' => 'nullable|string|max:255',
        ]);


        // Update Village
        $village->update([
            'name' => $validated['name'],
            'district' => $validated['district'],
            'damaged_buildings' => $validated['damaged_buildings'],
            'displaced_families' => $validated['displaced_families'],
            'population' => $validated['population'] ?? null,
            'accessible' => $validated['accessible'],
        ]);


        // Update, create, or delete Emergency Profile
        if (!empty($validated['priority_level'])) {

            $village->emergencyProfile()->updateOrCreate(
                [],
                [
                    'priority_level' => $validated['priority_level'],
                    'emergency_contact' => $validated['emergency_contact'] ?? null,
                    'notes' => $validated['emergency_notes'] ?? null,
                ]
            );

        } else {

            $village->emergencyProfile()->delete();
        }


        // Get the first currently connected organization
        $organization = $village->aidOrganizations()->first();

        if (!empty($validated['organization_name'])) {

            if ($organization) {

                $organization->update([
                    'name' => $validated['organization_name'],
                    'type' => $validated['organization_type'] ?? null,
                ]);

            } else {

                $organization = AidOrganization::create([
                    'name' => $validated['organization_name'],
                    'type' => $validated['organization_type'] ?? null,
                ]);

                $village->aidOrganizations()->attach($organization->id);
            }
        }


        return redirect()
            ->route('villages.index')
            ->with('success', 'Village updated successfully.');
    }


    public function destroy(Village $village)
    {
        $village->delete();

        return redirect()
            ->route('villages.index')
            ->with('success', 'Village deleted successfully.');
    }
}