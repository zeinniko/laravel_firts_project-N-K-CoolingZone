<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $r){
        $data = Product::limit(8)->inRandomOrder()->get();
        return view('home',compact('data'));
    }
}
