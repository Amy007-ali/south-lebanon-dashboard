<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index() {
        $villages = [
            [
                'name' => 'Kfar Kila',
                'district' => 'Marjayoun',
                'damaged_buildings' => 185,
                'displaced_families' => 410,
                'accessible' => false
            ],
            [
                'name' => 'Aita al-Shaab',
                'district' => 'Bint Jbeil',
                'damaged_buildings' => 140,
                'displaced_families' => 325,
                'accessible' => false
            ],
            [
                'name' => 'Mays al-Jabal',
                'district' => 'Marjayoun',
                'damaged_buildings' => 92,
                'displaced_families' => 215,
                'accessible' => true
            ],
            [
                'name' => 'Khiam',
                'district' => 'Marjayoun',
                'damaged_buildings' => 58,
                'displaced_families' => 130,
                'accessible' => true
            ],
            [
                'name' => 'Yaroun',
                'district' => 'Bint Jbeil',
                'damaged_buildings' => 24,
                'displaced_families' => 65,
                'accessible' => true
            ]
        ];
        
        return view('villages.index', compact('villages'));
    }

    public function reports() {
        $villages = [
            [
                'name' => 'Kfar Kila',
                'district' => 'Marjayoun',
                'damaged_buildings' => 185,
                'displaced_families' => 410,
                'accessible' => false
            ],
            [
                'name' => 'Aita al-Shaab',
                'district' => 'Bint Jbeil',
                'damaged_buildings' => 140,
                'displaced_families' => 325,
                'accessible' => false
            ],
            [
                'name' => 'Mays al-Jabal',
                'district' => 'Marjayoun',
                'damaged_buildings' => 92,
                'displaced_families' => 215,
                'accessible' => true
            ],
            [
                'name' => 'Khiam',
                'district' => 'Marjayoun',
                'damaged_buildings' => 58,
                'displaced_families' => 130,
                'accessible' => true
            ],
            [
                'name' => 'Yaroun',
                'district' => 'Bint Jbeil',
                'damaged_buildings' => 24,
                'displaced_families' => 65,
                'accessible' => true
            ]
        ];
        
        return view('reports', compact('villages'));
    }
}
