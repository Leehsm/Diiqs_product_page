<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductDetail;
use Session;
use Carbon\Carbon;

class AdminAboutProductController extends Controller
{
    public function view(){

        $aboutproduct = ProductDetail::latest()->get();

        return view('backend.menu.frontendInformation.about_product.view', compact('aboutproduct'));

    }

    public function create(){

        return view('backend.menu.frontendInformation.about_product.add');

    }
}
