<?php

namespace App\Http\Controllers;
use App\Models\AboutUsSetting;

use App\Models\TeamSetting;
use App\Models\TestimonialSetting;

use Illuminate\Http\Request;

class settingsController extends Controller
{
    //
    public function about_index(){

        $settings = AboutUsSetting::first();

        return view('about-us.index',compact('settings'));

    }
    public function edit()
    {
        $settings = AboutUsSetting::first();
        return view('about-us.edit', compact('settings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'about_us' => 'required',
            'our_mission' => 'required',
            'our_vision' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $settings = AboutUsSetting::first();
        if (!$settings) {
            $settings = new AboutUsSetting();
        }

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/assets/Landing-page/img'), $imageName);
            $settings->image = $imageName;
        }

        $settings->about_us = $request->about_us;
        $settings->our_mission = $request->our_mission;
        $settings->our_vision = $request->our_vision;
        $settings->save();


        return redirect()->route('settings.about_us')->with('success', 'Settings updated successfully.');
    }


    public function team_index()
    {
        $teamSettings = TeamSetting::all();
        return view('team.index', compact('teamSettings'));
    }

    public function team_create()
    {
        return view('team.create');
    }

    public function team_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $teamSetting = new TeamSetting();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/assets/Landing-page/img'), $imageName);
            $teamSetting->image = $imageName;
        }

        $teamSetting->name = $request->name;
        $teamSetting->designation = $request->designation;
        $teamSetting->twitter = $request->twitter;
        $teamSetting->facebook = $request->facebook;
        $teamSetting->instagram = $request->instagram;
        $teamSetting->linkedin = $request->linkedin;
        $teamSetting->save();

       
        return redirect()->route('settings.team')->with('success', 'Settings updated successfully.');
    }

    public function editTeamMember($id)
    {
        $teamMember = TeamSetting::findOrFail($id); // Make sure to replace TeamMember with the correct model name

        return view('team.edit', compact('teamMember'));
    }

    public function updateTeamMember(Request $request, $id)
    {
        $teamMember = TeamSetting::findOrFail($id);

        $teamMember->name = $request->input('name');
        $teamMember->designation = $request->input('designation');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/assets/Landing-page/img'), $filename);
            $teamMember->image = $filename;
        }

        $teamMember->twitter = $request->input('twitter');
        $teamMember->facebook = $request->input('facebook');
        $teamMember->instagram = $request->input('instagram');
        $teamMember->linkedin = $request->input('linkedin');

        $teamMember->save();

        return redirect()->route('settings.team')->with('success', 'Team member updated successfully');
    }


    public function testimonial_index()
    {
        $testimonialSettings = TestimonialSetting::all();
        return view('testimonial.index', compact('testimonialSettings'));
    }

    public function testimonial_create()
    {
        return view('testimonial.create');
    }

    public function testimonial_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string|max:255',

        
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonialSetting = new TestimonialSetting();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/assets/Landing-page/img'), $imageName);
            $testimonialSetting->image = $imageName;
        }

        $testimonialSetting->name = $request->name;
        $testimonialSetting->feedback = $request->feedback;
        $testimonialSetting->save();

       
        return redirect()->route('settings.testimonial')->with('success', 'Settings updated successfully.');
    }

    public function edittestimonial($id)
    {
        $testimonial = TestimonialSetting::findOrFail($id); // Make sure to replace testimonialMember with the correct model name

        return view('testimonial.edit', compact('testimonial'));
    }

    public function updatetestimonial(Request $request, $id)
    {
        $testimonial = TestimonialSetting::findOrFail($id);

        $testimonial->name = $request->input('name');
        $testimonial->feedback = $request->input('feedback');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/assets/Landing-page/img'), $filename);
            $testimonial->image = $filename;
        }

       
        $testimonial->save();

        return redirect()->route('settings.testimonial')->with('success', 'testimonial member updated successfully');
    }


}