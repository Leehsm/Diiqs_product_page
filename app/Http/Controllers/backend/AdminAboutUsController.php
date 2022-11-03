<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AboutUs;
use Session;
use Carbon\Carbon;

class AdminAboutUsController extends Controller
{
    public function view(){

        $aboutus = AboutUs::latest()->get();

        return view('backend.menu.frontendInformation.aboutus.view', compact('aboutus'));

    }

    public function create(){

        return view('backend.menu.frontendInformation.aboutus.add');

    }
}
