<?php

namespace App\Http\Controllers;
use Cloudinary\Uploader;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Farm_crop;
use App\Models\CropManagementProduct;
use App\Models\farm_register;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;


use App\Models\FarmUpload;
class farmUploadController extends Controller
{
    public function index()
    {
        $registers= FarmUpload::where('is_deleted', false)->get();
        if (session('success_message')){
            Alert::toast(session('success_message'),'success')->autoClose(4000);
        }
        return view('farmUpload.index',compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farm_registers=farm_register::where('is_deleted', false)->get();
      
        return view('farmUpload.create',compact('farm_registers'));
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // dd($request->all());

            $request->validate([
                'farm_register_id' => 'required',
                'media_type' => 'required|in:image,video'
            ]);
    

          $array = explode(",", $request->farm_register_id);

            $farmUpload = new FarmUpload();
            $farmUpload->activity_id = $array['0'];
            $farmUpload->farm_id = $array['1'];
            $farmUpload->type = $request->media_type;
 
            if ($request->media_type === 'image') {
                // $imagePath = $request->file('image_upload')->store('Public'); // Save image to the storage

                // $uploadResult =  Cloudinary()->upload($request->image_upload->getRealPath())->getSecurePath();
               

                $uploadedFileUrl = cloudinary()->upload($request->file('image_upload')->getRealPath())->getSecurePath();




                $farmUpload->file_path = $uploadedFileUrl;

               

            } elseif ($request->media_type === 'video') {
                // $videoPath = $request->file('video_upload')->store('Public'); // Save video to the storage
                $response = cloudinary()->uploadVideo($request->file('video')->getRealPath())->getSecurePath();

              
                $farmUpload->file_path = $response;
            }
    
            $farmUpload->save();

            if ($request->wantsJson()) {
                // Return JSON response for AJAX requests
                return response()->json(['success' => true, 'message' => 'File uploaded successfully.']);
            }
        
            // Redirect back with a success message for regular form submissions
            return redirect()->back()->with('success', 'File uploaded successfully.');

            // if (Auth::user()->name =="Admin"){
       
            //     // Redirect to the admin route
               
            //     return redirect()->route('farmUpload.index')->withToastSuccess('Media uploaded successfully');
            // } else {
    
            //     return back()->withToastSuccess("Media uploaded successfully");


    
            //     // Redirect to another route for non-admin users
            //     // return redirect()->route('non-admin-route')->withSuccessMessage('');
            // }
        // return redirect()->route('farmUpload.index');
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
        return view('farmUpload.edit',compact('farm_register'));
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
        $farm_register->update([
          $request->all()
        ]);
        return redirect()->route('farmUpload.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\farm_register  $farm_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(farm_register $farm_register)
    {
        // $farm_register->delete($farm_register->id);
        $farm_register->update(['is_deleted' => true]);

        return redirect()->route('farmUpload.index');
    }
}
