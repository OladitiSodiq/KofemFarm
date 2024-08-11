<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Farm_crop;
use App\Models\CropManagementProduct;
use App\Models\farm_register;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class farmRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farm_registers= farm_register::where('is_deleted', false)->get();
        if (session('success_message')){
            Alert::toast(session('success_message'),'success')->autoClose(4000);
        }
        return view('register.index',compact('farm_registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $FarmCrops=farm_crop::where('is_deleted', false)->get();
        // $CropManagementProduct=CropManagementProduct::where('is_deleted', false)->get();
        $categories=category::where('is_deleted', false)->get();
        return view('register.create',compact('categories','FarmCrops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('activiity_farm_id'));
        farm_register::create([
            'farm_id'=>$request->input('activiity_farm_id'),
            'farm_crop_id'=> $request->input('farm_crop_id'),
            'category_id'=> $request->input('category_id'),
            'total_cost'=> $request->input('total_cost'),
            'description'=> $request->input('description')
            
        ]);


        if (Auth::user()->name =="Admin"){
       
            // Redirect to the admin route
           
            return redirect()->route('register.index')->withToastSuccess('Farm Activities created successfully');
        } else {

            return back()->withToastSuccess("Farm Activities created successfully");

            // Redirect to another route for non-admin users
            // return redirect()->route('non-admin-route')->withSuccessMessage('');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\farm_register  $farm_register
     * @return \Illuminate\Http\Response
     */
    public function show(farm_register $farm_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\farm_register  $farm_register
     * @return \Illuminate\Http\Response
     */
    public function edit(farm_register $farm_register)
    {
        $FarmCrops=farm_crop::where('is_deleted', false)->get();
        // $CropManagementProduct=CropManagementProduct::where('is_deleted', false)->get();
        $categories=category::where('is_deleted', false)->get();
        // dd($farm_register);
        return view('register.edit',compact('farm_register','FarmCrops','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\farm_register  $farm_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, farm_register $farm_register)
    {
        // // dd( $request->all());
        // $farm_register->update([
        //   $request->all()
        // ]);
        // return redirect()->route('farm_register.index');

        // Validate the incoming request data
        $validatedData = $request->validate([
        
            'farm_crop_id' => 'required|integer',
            'category_id' => 'required|integer',
            'total_cost' => 'required|numeric',
            'description' => 'nullable|string'
        ]);

        // Update the farm_register with the validated data
        $farm_register->update($validatedData);


        if (Auth::user()->name =="Admin"){
       
            // Redirect to the admin route
           
            return redirect()->route('farm_register.index')->withToastSuccess('farm activites record created successfully');
        } else {

            return back()->withToastSuccess('farm activites record created successfully');

            // Redirect to another route for non-admin users
            // return redirect()->route('non-admin-route')->withSuccessMessage('');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\farm_register  $farm_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(farm_register $farm_register)
    {
       
        $farm_register->update(['is_deleted' => true]);

        return redirect()->route('farm_register.index');
    }
}
