<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUsSetting;
use App\Models\TestimonialSetting;
use App\Models\TeamSetting;

class landingController extends Controller
{
    //

    public function landing(){
        $company = AboutUsSetting::first();
        $teams = TeamSetting::all();
        $testimonials = TestimonialSetting::all();
        return view('landing', compact('company','teams','testimonials'));
    }
}
