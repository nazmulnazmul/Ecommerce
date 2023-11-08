<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $allproducts = Product::latest()->get();
        return view('admin.allproduct', compact('allproducts'));
    }
    
    // for add category
    public function AddProduct(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.addprodut', compact('categories','subcategories'));
    }

    // store Product
    public function StoreProduct(Request $request){

        // return $request;

        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_sort_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
       
        
        $image = $request->file('product_img');    
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('product-upload'),$img_name);
        $img_url = 'product-upload/' .$img_name;   

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'quantity' => $request->product_quantity,
            'product_sort_des' => $request->product_sort_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->product_price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ','-', $request->product_name))
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproduct')->with('message', 'Product Added Successfully!');
    }

    
    public function EditPorduct($id){
        $allproducts = Product::findOrFail($id);

        return view('admin.editproductimg', compact('allproducts'));
    }

    public function UpdateProductImg(Request $request){
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        

        $id = $request->id;

        $image = $request->file('product_img');    
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('product-upload'),$img_name);
        $img_url = 'product-upload/' .$img_name;  

        Product::findOrFail($id)->update([
            'product_img' => $img_url,
        ]);

        return redirect()->route('allproduct')->with('message', 'Product Image Updated Successfully!');

    }

    public function EditProduct($id){
        $product_info = Product::findOrFail($id);

        return view('admin.editproduct', compact('product_info'));
    }

    public function UpdateProduct(Request $request){
        $product_id = $request->id;

        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_sort_des' => 'required',
            'product_long_des' => 'required',
        ]);

        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'quantity' => $request->product_quantity,
            'product_sort_des' => $request->product_sort_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->product_price,
            'slug' => strtolower(str_replace(' ','-', $request->product_name)),
        ]);

        return redirect()->route('allproduct')->with('message', 'Product Updated Successfully!');
    }


    public function DeleteProduct($id){
        Product::findOrFail($id)->delete();

        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        
        Category::where('id', $cat_id)->decrement('product_count', 1);
        SubCategory::where('id', $subcat_id)->decrement('product_count', 1);

        return redirect()->route('allproduct')->with('message', 'Product Deleted Successfully!');
    }
}
