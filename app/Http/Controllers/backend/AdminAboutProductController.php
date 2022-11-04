<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductDetail;
use Session;
use Carbon\Carbon;
use Image;

class AdminAboutProductController extends Controller
{
    public function view(){

        $aboutproduct = ProductDetail::latest()->get();

        return view('backend.menu.frontendInformation.about_product.view', compact('aboutproduct'));

    }

    public function create(){

        return view('backend.menu.frontendInformation.about_product.add');

    }

    public function store(Request $request){

        $image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/about_product/'.$name_gen);
    	$save_url = 'upload/about_product/'.$name_gen;
        
        ProductDetail::insert([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredient,
            'volume' => $request->volume,
            'price' => $request->price,
            'image' => $save_url,
            'created_at' => Carbon::now(),
    	]);

        $notification = array(
			'message' => 'About Product Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $aboutproduct = ProductDetail::findOrFail($id);
        return view('backend.menu.frontendInformation.about_product.edit', compact('aboutproduct'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->image;

        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/about_product/'.$name_gen);
            $save_url = 'upload/about_product/'.$name_gen;

            ProductDetail::findOrFail($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'ingredients' => $request->ingredient,
                'volume' => $request->volume,
                'price' => $request->price,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Product Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-about-product')->with($notification);

        }else{
            ProductDetail::findOrFail($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'ingredients' => $request->ingredient,
                'volume' => $request->volume,
                'price' => $request->price,
            ]);

            $notification = array(
                'message' => 'About Product Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-about-product')->with($notification);
        }
    }

    public function delete($id){

        $product = ProductDetail::findOrFail($id);
    	$image = $product->image;
    	unlink($image);
    	ProductDetail::findOrFail($id)->delete();

    	$notification = array(
			'message' => ' About Product Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
}
