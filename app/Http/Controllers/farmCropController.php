<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Farm;
use App\Models\Farm_crop;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class farmCropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farm_crops=Farm_crop::where('is_deleted', false)->get();
        if (session('success_message')){
            Alert::toast(session('success_message'),'success')->autoClose(4000);
        }

        return view('farm-crop.index',compact('farm_crops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farms=farm::where('is_deleted', false)->where('staff_id',Auth::User()->id)->get();
        $crops=Crop::all();
        return view('farm-crop.create',compact('farms','crops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result= $request->all();
        $farmId = $result["farm_id"];

        Farm::where('id', $farmId)->update([
            'status' => 'Active',
        ]);

      
        Farm_crop::create($result);

        if (Auth::user()->role_id == 2){
       
            // Redirect to the admin route
            return redirect()->route('farm-crop.index')->withToastSuccess('farm crop created successfully');
        } else {

            return back()->withToastSuccess("farm crop created successfully");

            // Redirect to another route for non-admin users
            // return redirect()->route('non-admin-route')->withSuccessMessage('');
        }
    }
        
       

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\farm_crop  $farm_crop
     * @return \Illuminate\Http\Response
     */
    public function show(Farm_crop $farm_crop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\farm_crop  $farm_crop
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm_crop $farm_crop)
    {
        // dd($farm_crop);
        $farms=farm::where('status','NA')->where('is_deleted', false)->where('staff_id',Auth::User()->id)->get();
        $crops=Crop::all();
        return view('farm-crop.edit',compact('farms','crops','farm_crop'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\farm_crop  $farm_crop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm_crop $farm_crop)
    {

        // dd($request->all());
        $farm_crop->update($request->all());
        return redirect()->route('farm-crop.index')->withSuccessMessage('farm crop updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\farm_crop  $farm_crop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm_crop $farm_crop)
    {
        $farm_crop->update(['is_deleted' => true]);
        return redirect()->route('farm-crop.index')->withSuccessMessage('farm crop deleted successfully');
    }

    
}
