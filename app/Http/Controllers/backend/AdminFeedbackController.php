<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Feedback;
use Session;
use Carbon\Carbon;
use Image;

class AdminFeedbackController extends Controller
{
    public function view(){

        $feedback = Feedback::latest()->get();

        return view('backend.menu.feedback.view',compact('feedback'));
    }

    public function delete($id){

        $feedback = Feedback::findOrFail($id);
    	$image = $feedback->image;
    	unlink($image);
    	Feedback::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Feedback Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
}
