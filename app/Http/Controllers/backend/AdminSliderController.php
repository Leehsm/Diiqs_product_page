<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductDetail;
use App\Models\Slider;
use App\Models\Combo;
use Session;
use Carbon\Carbon;

class AdminSliderController extends Controller
{
    public function view(){

        $slider = Slider::latest()->get();

        return view('backend.menu.frontendInformation.slider.view',compact('slider'));
    }

    public function create(){

        return view('backend.menu.frontendInformation.slider.add');

    }
}
