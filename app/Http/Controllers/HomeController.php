<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $locations = Location::with('category')->get();

        $stats = [
            'total_locations' => Location::count(),
            'total_categories' => Category::count(),
            'total_umkm' => Location::whereHas('category', function($q) {
                $q->where('name', 'like', '%UMKM%');
            })->count() ?: 15 // Fallback dummy if 0
        ];

        return view('welcome', compact('categories', 'locations', 'stats'));
    }

    public function showLocation($id)
    {
        $location = Location::with('category')->findOrFail($id);
        return view('location-detail', compact('location'));
    }
}
