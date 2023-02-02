<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoppingniko;
use App\Models\Product;

class ShoppingController extends Controller
{
    public function index(Request $r){
        $product = Product::all();
        return view('shopping-niko',compact('product'));
    }

    public function proses(Request $r){
        $r->validate([ 
            'name' => 'required|min:4|max:20',
            'whatsapp' => 'required|min:11|max:13',
            'address' => 'required|min:10|max:55',
            'product' => 'required|exists:products,id',
            'qty' => 'required|numeric|min:1|max:10',
            'note' => 'nullable|min:5'
        ]); 
        $new = new shoppingniko(); 
        $new->buyer_name = $r->name;
        $new->buyer_whatsapp = $r->whatsapp;
        $new->buyer_address = $r->address;
        $new->product_id = $r->product;
        $new->qty = $r->qty;
        $qty=$r->qty;
        $req_product = $r->product;
        $price = Product::findOrFail($req_product);
        $req_price = $price['price'];
        $total=$qty*$req_price;
        $new->total = $total;
        $new->note = $r->note;
        if($new->save()){
            $r->session()->flash('msg','Shopping Success, our admin will contack you soon.');
        }else{
            $r->session()->flash('msgerror','Shopping failed, please try again');  
        }
        return redirect('shopping-niko');
    }
}
