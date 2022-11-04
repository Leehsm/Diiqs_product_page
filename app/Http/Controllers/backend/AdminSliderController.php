<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Combo;
use Session;
use Carbon\Carbon;
use Image;

class AdminSliderController extends Controller
{
    public function view(){

        $slider = Slider::latest()->get();

        return view('backend.menu.frontendInformation.slider.view',compact('slider'));
    }

    public function create(){

        return view('backend.menu.frontendInformation.slider.add');

    }

    public function store(Request $request){

        $image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    	$save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'name' => $request->name,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $save_url,
            'created_at' => Carbon::now(),
    	]);

        $notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $slider = Slider::findOrFail($id);
        return view('backend.menu.frontendInformation.slider.edit', compact('slider'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->image;

        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-slider')->with($notification);

        }else{
            Slider::findOrFail($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
            ]);

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);
        }
    }

    public function delete($id){

        $slider = Slider::findOrFail($id);
    	$image = $slider->image;
    	unlink($image);
    	Slider::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Slider Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
}
