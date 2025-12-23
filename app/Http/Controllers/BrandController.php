<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('brands.index', ['title' => 'Brands']);
    }
    
    public function show($slug)
    {
        return view('brands.show', ['title' => 'Brand Details']);
    }
}