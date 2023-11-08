<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //
    public function viewCategory(){
        $categories = Category::all();
        return view('Admin.Category.category', compact('categories'));
    }

    public function addCategoryPage(){
       
        return view('Admin.Category.addCategory');
    }

    public function addCategory(Request $request){
        $data['user_id'] = auth()->user()->id;
        $data['category_name'] = $request->input('category');
       
        
        $insert = Category::create($data);

        return Redirect(route('category'));

    }
}
