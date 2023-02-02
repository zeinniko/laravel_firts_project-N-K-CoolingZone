<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $data = Product::with('category')->where('user_id',Auth::user()->id)->get();
        return view('product',compact('data'));
    }
    public function add(){
        $category = Category::where('user_id',Auth::user()->id)->get();
        return view('product_add',compact('category'));
    }
    public function add_process(Request $r){
        $r->validate([
            'category' => 'required|exists:categories,id',
            'price' => 'required|min:3|max:50',
            'photo' => 'required|mimes:jpg,jpeg,png,webp',
        ]);
        $photo = $r->file('photo');
        $new_name_photo = uniqid().".".$photo->getClientOriginalExtension();
        $photo->move('images',$new_name_photo);
        $new = new Product();
        $new->user_id = Auth::user()->id;
        $new->category_id = $r->category;
        $new->name = $r->name;
        $new->price = $r->price;
        $new->photo = $new_name_photo;
        $new->save();
        $r->session()->flash('msg','Process Success.');
        return redirect('product-add');
    }
    public function del_process(Request $req, $id){
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect('product');
    }

    public function edit(Request $r, $id){
        $category = Category::where('user_id',Auth::user()->id)->get();
        $data = Product::findOrFail($id);

        return view('product_edit',compact('category','data'));
    }

    public function edit_process(Request $r,$id){
        $r->validate([
            'category' => 'required|exists:categories,id',
            'price' => 'required|min:3|max:50',
            'photo' => 'nullable|mimes:jpg,jpeg,png,webp',
        ]);

        if($r->file('photo')){
            $photo = $r->file('photo');
            $new_name_photo = uniqid().".".$photo->getClientOriginalExtension();
            $photo->move('images',$new_name_photo);
        }

        $new = Product::findOrFail($id);
        $new->user_id = Auth::user()->id;
        $new->category_id = $r->category;
        $new->name = $r->name;
        $new->price = $r->price;
        if($r->file('photo')){
        $new->photo = $new_name_photo;
        }
        $new->save();
        $r->session()->flash('msg','Process Success.');
        return redirect('product-edit/'.$id);
    }
}
