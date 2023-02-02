<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $r){
        $data = Product::with('seller')->where('name','like',"%$r->search%")->get();
        return view('catalog',compact('data'));
    }
}
