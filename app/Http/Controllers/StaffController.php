<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::where('role_id',2)->get();
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'fullname' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'start_date' => 'required|date',
            'address' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:15',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:20',
            'bank_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        User::create([
            'name' => $request->fullname,
            'position' => $request->position,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'start_date' => $request->start_date,
            'address' => $request->address,
            'emergency_contact_name' => $request->emergency_contact_name,
            'emergency_contact_number' => $request->emergency_contact_number,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'description' => $request->description,
            'role_id' => 2,
        ]);

        return redirect()->route('staff.index')->withSuccessMessage('Staff member added successfully');

    }

    public function edit($id)
    {
        $staff = User::find($id);
        if (!$staff) {
            return redirect()->route('staff.index')->with('error', 'Staff member not found.');
        }
        
        return view('staff.edit', compact('staff'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'start_date' => 'required|date',
            'address' => 'required|string',
            'emergency_contact_name' => 'required|string',
            'emergency_contact_number' => 'required|numeric',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'bank_name' => 'required|string',
            'description' => 'nullable|string',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        $staff = User::find($id);
        if (!$staff) {
            return redirect()->route('staff.index')->with('error', 'Staff member not found.');
        }

        $staff->name = $request->fullname;
        $staff->position = $request->position;
        $staff->phone_number = $request->phone_number;
        $staff->email = $request->email;
        $staff->start_date = $request->start_date;
        $staff->address = $request->address;
        $staff->emergency_contact_name = $request->emergency_contact_name;
        $staff->emergency_contact_number = $request->emergency_contact_number;
        $staff->account_name = $request->account_name;
        $staff->account_number = $request->account_number;
        $staff->bank_name = $request->bank_name;
        $staff->description = $request->description;
        if ($request->filled('password')) {
            $staff->password = Hash::make($request->password);
        }

        $staff->save();



        return redirect()->route('staff.index')->withSuccessMessage('Staff member updated successfully');
    }

}
