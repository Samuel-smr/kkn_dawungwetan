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

        return view('welcome', compact('categories', 'locations'));
    }
}
