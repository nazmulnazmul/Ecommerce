<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    // for add category
    public function AddCategory(){
        return view('admin.addcategory');
    }

    // for SoterCategory
    public function SoterCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        // option - 2:
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message', 'Category Added Successfully!');

    }

    public function Editcategory($id){
        // option -1

        // return view('admin.editcategory',[
        //     'category' => Category::find($id)
        // ]);

        // option - 2
        $Category_info = Category::findOrFail($id);
        return view('admin.editcategory', compact('Category_info'));
    }

    public function UpdateCategory(Request $request){
            $category_id = $request->category_id;

            $validated = $request->validate([
                'category_name' => 'required|unique:categories',
            ]);

            // for update
            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'slug' => strtolower(str_replace(' ','-', $request->category_name))
            ]);
            return redirect()->route('allcategory')->with('message', 'Category Updated Successfully!');

    }

    // for DeleteCategory
    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();

        return redirect()->route('allcategory')->with('message', 'Category Deleted Successfully!');
    }

 

}

