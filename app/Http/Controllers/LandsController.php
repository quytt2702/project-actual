<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandsController extends Controller
{
    public function transcend(Request $request)
    {
        return view('lands.transcend.layout');
    }

    public function robotics()
    {
        return view('lands.robotics.layout');
    }

    public function landing()
    {
        return view('lands.landing.layout');
    }

    public function glint()
    {
        return view('lands.glint.layout');
    }

    public function ca()
    {
        return view('lands.ca.layout');
    }
}
