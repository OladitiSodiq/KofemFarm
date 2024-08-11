<?php

namespace App\Http\Controllers;

use App\Models\Farm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class farmAssetsController extends Controller
{
    //

    public function index(){

        $farm = farm::all();

        $joinedData = DB::table('transactions')
        ->join('farms', 'farms.id', '=', 'transactions.farm_id')
        ->join('assets', 'assets.id', '=', 'transactions.asset_id')
        ->join('farm_registers', 'farm_registers.id', '=', 'transactions.activity_id')
        ->join('farm_crops', 'farm_crops.id', '=', 'farm_registers.farm_crop_id')
        ->join('categories', 'farm_registers.category_id', '=', 'categories.id')
        ->join('crops', 'crops.id', '=', 'farm_crops.crop_id')
        ->where('transactions.farm_id', $request->farm_id)
        ->select(
            DB::raw("CONCAT(categories.name, ' - '  , crops.name) as farmactivities"),
            'assets.name as assets',
            'transactions.amount as amount',
            'transactions.stock as stock'
            , 'farms.name as farm',
        )
        ->selectRaw("DATE_FORMAT(transactions.created_at, '%d%b%y') as date")
        ->get();
    }

    public function create()
    {
        $farms=farm::where('is_deleted', false)->where('staff_id',Auth::User()->id)->get();
      
        return view('farm-assets.create',compact('farms'));
    }
}
