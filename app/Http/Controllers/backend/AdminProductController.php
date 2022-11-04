<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Session;
use Carbon\Carbon;
use Image;

class AdminProductController extends Controller
{
    public function view(){

        $product = Product::latest()->where('category','normal')->get();
        $combo = Product::latest()->where('category','combo')->get();

        return view('backend.menu.frontendInformation.product_and_combo.view', compact('product','combo'));

    }

    public function create(){

        return view('backend.menu.frontendInformation.Product_and_combo.add');

    }

    public function store(Request $request){

        // dd($request->all());
        $image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/product_and_combo/'.$name_gen);
    	$save_url = 'upload/product_and_combo/'.$name_gen;
        
        Product::insert([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'gallery' => $save_url,
            'created_at' => Carbon::now(),
    	]);

        $notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function edit($id){

        $product = Product::findOrFail($id);
        return view('backend.menu.frontendInformation.Product_and_combo.edit', compact('product'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->image;

        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/product_and_combo/'.$name_gen);
            $save_url = 'upload/product_and_combo/'.$name_gen;

            Product::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-product-and-combo')->with($notification);

        }else{
            Product::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'description' => $request->description,
                'quantity' => $request->quantity,
            ]);

            $notification = array(
                'message' => 'Product Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-product-and-combo')->with($notification);
        }
    }

    public function delete($id){

        $product = Product::findOrFail($id);
    	$image = $product->image;
    	unlink($image);
    	Product::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
}
