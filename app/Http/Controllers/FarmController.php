<?php

namespace App\Http\Controllers;
use App\Models\Assets;
use App\Models\Farm;
use App\Models\Farm_crop;
use App\Models\StaffRoleActivity;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->role_id == 2)
        {
            $farms=Farm::where('is_deleted', false)->where('staff_id',Auth::User()->id)->get();
           
        }
        else{
            $farms=Farm::with('user')->get();
        }
        
        if (session('success_message')){
            Alert::toast(session('success_message'),'success')->autoClose(4000);
        }



        return view('farm.index',compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Farm::create(array_merge(
            $request->all(),
            [
                'created_on' => Carbon::now()
               
            ]
        ));

        if (Auth::user()->role_od == 2 ){
       
            // Redirect to the admin route
           
            return redirect()->route('farm.index')->withToastSuccess('farm record created successfully');
        } else {

            return back()->withToastSuccess('farm record created successfully');

            // Redirect to another route for non-admin users
            // return redirect()->route('non-admin-route')->withSuccessMessage('');
        }
        // return redirect()->route('farm.index')->withSuccessMessage('farm record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        $farm = Farm::findorfail($farm->id);

        return view('farm.show',compact('farm'));

        // dd(compact('farm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        return view('farm.edit',compact('farm'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        $farm->update([
            'name'=> $request->input('name'),
            'description'=> $request->input('description'),
            'size'=> $request->input('size'),

            'location'=>$request->input('location')
        ]);
        return redirect()->route('farm.index')->withSuccessMessage('farm updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
       
        $farm->update(['is_deleted' => true]);
        return redirect()->route('farm.index')->withSuccessMessage('farm record deleted successfully');


    }

    public function getInfo($farm_crop_id)
    {
        // Fetch the necessary data based on $farm_crop_id
        // For example:
        $farmCrop = Farm_crop::where('id',$farm_crop_id)->first();
        $farmname = Farm::where('id',$farmCrop->farm_id)->first();

        
        return response()->json($farmname->size);
    }

    public function getFarmData(Request $request){
        // dd( $request->farm_id);


        // $farmData = Farm_crop::where('farm_id',$request->farm_id)->select('*')->get();

        $farmData = DB::table('farm_crops')
        ->join('crops', 'farm_crops.crop_id', '=', 'crops.id')
        ->join('farms', 'farm_crops.farm_id', '=', 'farms.id')
        ->where('farm_crops.farm_id', $request->farm_id)
        ->select( 'farms.name as farmnae' ,'crops.name as cropname','farms.size as farmsize')
        ->selectRaw("DATE_FORMAT(crops.created_at, '%d%b%y') as datepalnted")

        ->get();


     
        return response()->json(['data' => $farmData]);

    }


    public function getActivitiesData(Request $request){
        // dd( $request->farm_id);


        // $farmData = Farm_crop::where('farm_id',$request->farm_id)->select('*')->get();

        $farmData = DB::table('farm_crops')
        ->join('crops', 'farm_crops.crop_id', '=', 'crops.id')
        ->join('farms', 'farm_crops.farm_id', '=', 'farms.id')
        ->join('farm_registers', 'farm_crops.id', '=', 'farm_registers.farm_crop_id')

        ->join('categories','farm_registers.category_id' , '=', 'categories.id'  )

        ->where('farm_crops.farm_id', $request->farm_id)
        ->select( 'farms.name as farmnae' ,'crops.name as cropname','categories.name as operations','farm_registers.total_cost as cost')
        ->selectRaw("DATE_FORMAT(farm_registers.created_at, '%d%b%y') as date")
       
        ->get();
        // dd( $farmData);


        return response()->json(['data' => $farmData]);

    }


    public function getAssetsData(Request $request){
        // dd( $request->farm_id);
    //     @php
        // $farmactivity =App\farm_register::where('id',$transaction->activity_id)->first();

        // $FarmCrop  =App\Farm_crop::where('id',$farmactivity->farm_crop_id)->first();
        
        
        // $category  =App\Category::where('id',$farmactivity->category_id)->first();
        // $farmname = App\farm::where('id',$FarmCrop->farm_id)->first();
        // $cropname = App\crop::where('id',$FarmCrop->crop_id)->first();
    // @endphp
        
        // {{$farmname->name}}.-.{{$cropname->name}}.-.{{ $category->name}}


                


    //     ->join('farm_crops','farm_crops.id','=' ,'farm_registers.farm_crop_id')
    // ->join('categories', 'farm_registers.category_id', '=', 'categories.id')
    // ->join('farms', 'farm_crops.farm_id', '=', 'farms.id')
    // ->join('crops', 'farm_crops.crop_id', '=', 'crops.id')
    // ->join('farm_registers', 'farm_registers.id', '=', 'transactions.id')



    // ->where('transactions.farm_id', $request->farm_id)
   

        // $farmData = Farm_crop::where('farm_id',$request->farm_id)->select('*')->get();
        // App\farm_register::select('farm_register.*', 'farm_crops.*', 'categories.*', 'farms.name as farm_name', 'crops.name as crop_name')dd

    //     $joinedData = DB::table('transactions')

    //       ->join('farms', 'farms.id', '=', 'transactions.farm_id')
    //       ->join('assets', 'assets.id','=','transactions.asset_id')
    //       ->join('farm_registers', 'farm_registers.id','=','transactions.activity_id')

    //       ->join('farm_crops', 'farm_crops.id','=','farm_registers.farm_crop_id')

    //       ->join('categories','farm_registers.category_id' , '=', 'categories.id'  )
    //       ->join('crops', 'crops.id','=','farm_crops.crop_id')
          

    //     ->where('transactions.farm_id', $request->farm_id)
    //     ->select( 'categories.name as operations','farms.name as farm','crops.name as crops' ,'assets.name as assets' ,'transactions.amount as amount','transactions.stock as stock')
    // ->selectRaw("DATE_FORMAT(transactions.created_at, '%d%b%y') as date")
    // ->get();


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


    // dd( $joinedData);



       
        // dd( $farmData);


        return response()->json(['data' => $joinedData]);

    }

    public function getAssets(Request $request){
        $assets = DB::table('assets')->where('id',$request->assetid)->first();
        $stock = DB::table('stocks')->where('asset_id',$request->assetid)->first();
        $data = [
            'price' => $assets->price,
            'stockid' => $stock->id,
            'current_stock' => $stock->current_stock,
        ];
        
        // Return the combined data as JSON
        return response()->json($data);
        // return response()->json(['data' => $farmData]);
        
    }


    public function storeStock(Request $request)
    {
        // dd($request->all());
        $farmData = DB::table('farm_registers')->where('id',$request->activity_id)->first();
   
        $sign ="-";
        $stock = Stock::where('asset_id',$request->asset_id)->where('team_id',1)->first();


        if ($stock->current_stock - $request->quantity < 0) {
            return back()->withToastWarning('Not enough items in stock');
        }
        else {
            Transaction::create([
                'stock'    => $sign .  $request->quantity,
                'asset_id' => $request->asset_id,
                'team_id'  => "1",
                'user_id'  => 3,
                // 'farm_id'  => $farmData->farm_id,
                'farm_id'  => $farmData->farm_id  ?? $request->farm_id,
                'activity_id'  => $request->activity_id,
                'amount'=> $request->quantity * $request->assetprice ,

    
            ]);

            $stock->decrement('current_stock', $request->quantity);
            $status = $request->quantity . ' item(-s) was removed from stock.';
            return back()->withToastSuccess($status);
        
        }
        // $sign 
            //     return redirect()->route('category.index')->withToastWarning('cannot delete existing parent farm');
            // }
            // else{
            //     $farm->delete();
            //     return redirect()->route('farm.index')->withSuccessMessage('farm record deleted successfully');
            // }



    }

    public function staffrole(Request $request)
    {
        
        Farm::where('id',$request->input('farm_id'))->update([
            'staff_id'=> $request->input('assignedstaff')
        ]);
        User::where('id',$request->input('assignedstaff'))->update([
            'is_assigned'=> 1
        ]);
        StaffRoleActivity::create([
            'staff_id' => $request->input('assignedstaff'),
            'farm_id' => $request->input('farm_id')
        ]);
        return back()->withSuccessMessage('Staff Assigned to Farm successfully');
    }

    
}
