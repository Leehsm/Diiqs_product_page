<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AboutUs;
use Session;
use Carbon\Carbon;
use Image;

class AdminAboutUsController extends Controller
{
    public function view(){

        $aboutus = AboutUs::latest()->get();

        return view('backend.menu.frontendInformation.aboutus.view', compact('aboutus'));

    }

    public function create(){

        return view('backend.menu.frontendInformation.aboutus.add');

    }

    public function store(Request $request){

        $image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/about_us/'.$name_gen);
    	$save_url = 'upload/about_us/'.$name_gen;
        
        AboutUs::insert([
            'description_line_1' => $request->description1,
            'description_line_2' => $request->description2,
            'description_line_3' => $request->description3,
            'image' => $save_url,
            'created_at' => Carbon::now(),
    	]);

        $notification = array(
			'message' => 'About Us Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $aboutus = AboutUs::findOrFail($id);
        return view('backend.menu.frontendInformation.aboutus.edit', compact('aboutus'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->image;

        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/about_us/'.$name_gen);
            $save_url = 'upload/about_us/'.$name_gen;

            AboutUs::findOrFail($id)->update([
                'description_lline_1' => $request->description1,
                'description_lline_1' => $request->description2,
                'description_lline_1' => $request->description3,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Us Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-product-and-combo')->with($notification);

        }else{
            AboutUs::findOrFail($id)->update([
                'description_lline_1' => $request->description1,
                'description_lline_1' => $request->description2,
                'description_lline_1' => $request->description3,
            ]);

            $notification = array(
                'message' => 'About Us Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-product-and-combo')->with($notification);
        }
    }

    public function delete($id){

        $aboutus = AboutUs::findOrFail($id);
    	$image = $aboutus->image;
    	unlink($image);
    	AboutUs::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'About Us Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
}
