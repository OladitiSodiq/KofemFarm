<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Crop;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crops = Crop::where('is_deleted', false)->get();
        if (session('success_message')){
            Alert::toast(session('success_message'),'success')->autoClose(4000);
        }
        return view('crop.index',compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Crop::create([
            'name'=> $request->input('name'),
            'description'=> $request->input('description'),
            'duration'=>$request->input('duration')
        ]);

     
           
            return redirect()->route('crop.index')->withToastSuccess('Crop created successfully');
      

        // return redirect()->route('crop.index')->withSuccessMessage('Crop added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function show(Crop $crop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function edit(Crop $crop)
    {
        return view('crop.edit',compact('crop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crop $crop)
    {
        $crop->update([
        'name'=> $request->input('name'),
        'description'=> $request->input('description'),
        'duration'=>$request->input('duration')
    ]);
        return redirect()->route('crop.index')->withSuccessMessage('category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crop  $crop
     * @return \Ill return redirect()->route('crop.index');uminate\Http\Response
     */
    public function destroy(Crop $crop)
    {
        
        $crop->update(['is_deleted' => true]);
        return redirect()->route('crop.index')->withSuccessMessage('farm record deleted successfully');
    }
}
