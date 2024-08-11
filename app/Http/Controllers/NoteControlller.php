<?php

namespace App\Http\Controllers;

use App\Models\farm_crop;
use App\Models\farm_note;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class NoteControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farm_notes = farm_note::where('is_deleted', false)->get();
        if (session('success_message')){
            Alert::toast(session('success_message'),'success')->autoClose(4000);
        }

        return view('note.index', compact('farm_notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        farm_note::create([
            'farm_id' => $request->input('farm_id'),
            'notes' => $request->input('notes'),
        ]);

        if (Auth::user()->name =="Admin"){
       
            // Redirect to the admin route
           
            return redirect()->route('note.index')->withToastSuccess('note created successfully');
        } else {

            return back()->withToastSuccess("note created successfully");

            // Redirect to another route for non-admin users
            // return redirect()->route('non-admin-route')->withSuccessMessage('');
        }
        // return redirect()->route('note.index')->withSuccessMessage('note created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\farm_note $farm_note
     * @return \Illuminate\Http\Response
     */
    public function show(farm_note $farm_note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\farm_note $farm_note
     * @return \Illuminate\Http\Response
     */
    public function edit(farm_note $farm_note)
    {
        return view('note.edit', compact('farm_note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\farm_note $farm_note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, farm_note $farm_note)
    {
        $farm_note->update( $request->all());
        return redirect()->route('note.index')->withSuccessMessage('note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\farm_note $farm_note
     * @return \Illuminate\Http\Response
     */
    public function destroy(farm_note $farm_note)
    {
        // $farm_note->delete();s
       $farm_note->update(['is_deleted' => true]);

        return redirect()->route('note.index')->withSuccessMessage('Note deleted successfully');
    }
}

