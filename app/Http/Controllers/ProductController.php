<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function show($id)
    {
        return view('product.show', ['id' => $id]);
    }
}
