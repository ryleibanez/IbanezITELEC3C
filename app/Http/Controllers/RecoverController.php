<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Fortify\RecoveryCode;

class RecoverController extends Controller
{
    //

    public function viewRecoverData()
    {

        $db = Category::withTrashed()
            ->whereNotNull('deleted_at') // Include only soft-deleted records
            ->orderBy('id', 'desc')       // Order by 'id' in descending order
            ->paginate(10);




        return view('Admin.Category.RecoverData', compact('db'));
    }


    public function recoverData(Request $request)
    {

        $id = $request->query('id');

        $category = Category::withTrashed()->find($id);


        if ($category) {
            $category->restore();

            return redirect()->route('category')->with('success', 'Category restored successfully.');
        }
    }
}
