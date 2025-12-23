<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', ['title' => 'Categories']);
    }
    
    public function show($slug)
    {
        return view('categories.show', ['title' => 'Category Details']);
    }
}