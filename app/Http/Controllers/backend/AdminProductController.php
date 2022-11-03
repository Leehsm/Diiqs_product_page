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

class AdminProductController extends Controller
{
    public function view(){

        $product = product::latest()->where('category','normal')->get();
        $combo = product::latest()->where('category','combo')->get();

        return view('backend.menu.frontendInformation.product_and_combo.view', compact('product','combo'));

    }

    public function create(){

        return view('backend.menu.frontendInformation.Product_and_combo.add');

    }
}
