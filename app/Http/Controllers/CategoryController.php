<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::where('user_id',Auth::user()->id)->get();
        return view('category', compact('data'));
    }
    public function categoryform(){
        return view('categoryform');
    }
    public function categoryform_proses(Request $r){
        $r->validate([
            'name'=>'required|min:3|max:50',
        ]);
        
        $insert = new Category();
        $insert->user_id = Auth::user()->id;
        $insert->name=$r->name;
        $insert->save();

        $r->session()->flash('msg','Process success.');
        return redirect('categoryform');
    }

    public function del_process(Request $req, $id){
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect('category');
    }

    public function edit(Request $req, $id){
        $data = Category::findOrFail($id);
        return view('category_edit', compact('data'));
    }

    public function edit_process(Request $r, $id){
        $r->validate([
            'name'=>'required|min:3|max:50',
        ]);
        
        $data = Category::findOrFail($id);
        $data->name=$r->name;
        $data->save();

        $r->session()->flash('msg','Process success.');
        return redirect('category-edit/'.$id);
    }
}
