<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //

    public function searchCategoryPage(Request $request){
        $search = $request->query('search');

        $cat = Category::where('category_name','like','%'.$search.'%')->orderBy('created_at','desc')->paginate(5);

        if($cat){
            return view ('Admin.Category.searchCategory', compact('cat','search'));
        }
    }

    public function viewCategoryItems(Request $request){
        $page = $request->query('page');

    }
    public function viewCategory()
    {
        $categories = Category::orderby('created_at', 'desc')->paginate(5);
        return view('Admin.Category.category', compact('categories'));
    }

    public function addCategoryPage()
    {

        return view('Admin.Category.addCategory');
    }

    public function addCategory(Request $request)
    {
        
        $data['user_id'] = auth()->user()->id;
        $data['category_name'] = $request->input('category_name');

        $validator = Validator::make($request->all(), [

            'category_name' => 'required|unique:categories,category_name,NULL,id,deleted_at,NULL',

        ]);

        if ($validator->fails()) {
            // Validation failed
            return response()->json([
                'status' => $validator->errors(),
            ], 422);
        }

        $insert = Category::create($data);
        if ($insert) {
            session()->flash('addCat','success');

            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status'=>'failed']);
        }
    }

    public function deleteCategory(Request $request)
    {

        $id = $request->query('id');

        $db = Category::where('id', '=', $id)->first();

        if ($db) {
            $db->delete();
            session()->flash('delete', 'success');

            return Redirect()->back();
        }
    }

    public function editCategory(Request $request)
    {
        $id = $request->query('id');

        $db = Category::where('id', $id)->get();

        return view('Admin.Category.editCategory', compact('db'));
    }

    public function editCategoryPost(Request $request)
    {
        $id = $request->input('id');

        $validator = Validator::make($request->all(), [

          'category_name' => 'required|unique:categories,category_name,NULL,id,deleted_at,NULL',

        ]);

        if ($validator->fails()) {
            // Validation failed
            return response()->json([
                'status' => $validator->errors(),
            ], 422);
        }else {

        $db = Category::where('id', $id)->first();

            if ($db) {
                $db->category_name = $request->input('category_name');
                $db->save();
                session()->flash('edit','success');
                return response()->json(['status'=>'success']);
            }else{
                return response()->json(['status'=>'failed']);
            }
        }
    }
}
