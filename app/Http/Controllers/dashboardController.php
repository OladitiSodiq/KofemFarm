<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    //
    public function dashboard(){
        if (Auth::user()->role_id == 1){
            $crop_count =Crop::count();
            $farm_count =Farm::where('is_deleted',0)->count();

            $crops =Crop::get();
            $farms =Farm::where('is_deleted',0)->get();




            return view('dashboard',compact('crop_count','farm_count','crops','farms'));

        }
    }

    
}
