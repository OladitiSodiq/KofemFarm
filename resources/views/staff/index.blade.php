@extends('layout')
@section('content')
   

    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">View Staff</p>
            <p>Browse and manage detailed information about your farm staff, including their roles, contact details, and more. Use the action buttons to edit or delete staff member information as needed.</p>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-end mt-3 mt-md-0">
            <a href="add-staff.html" class="btn bg-success text-white p-2 px-4">
                Add Staff<i class="fa-regular fa-add ps-2"></i>
            </a>
        </div>
    </div>

    <div class="row mt-4">

        @foreach ($staffs as $staff)

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $staff->name }}</h5>
                      
                        <p class="card-text"><strong>Position:</strong> {{ $staff->position }}</p>
                        <p class="card-text"><strong>Phone No:</strong> {{ $staff->phone_number }}</p>
                        <p class="card-text"><strong>E-mail:</strong> {{ $staff->email }}</p>
                        <p class="card-text"><strong>Start Date:</strong> {{ $staff->start_date }}</p>
                        <p class="card-text"><strong>Contact Address:</strong>{{ $staff->address }}</p>
                        <p class="card-text"><strong>Emergency Contact Name:</strong>{{ $staff->emergency_contact_name }}</p>
                        <p class="card-text"><strong>Emergency Contact No:</strong> {{ $staff->emergency_contact_number }}</p>
                        <p class="card-text"><strong>Account Name:</strong>{{ $staff->account_name }}</p>
                        <p class="card-text"><strong>Account Number No:</strong> {{ $staff->account_number }}</p>
                        <p class="card-text"><strong>Bank Name:</strong> {{ $staff->bank_name }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $staff->position }}</p>
                        <div class="d-flex justify-content-between">
                        
                           


                            <a href="{{route('staff.edit',$staff)}}" class="pe-lg-3 p-2 me-lg-2 text-white bg-primary d-inline-block mb-3  text-center"><i class="fa-regular fa-edit px-2"></i>Edit</a>
                        
                            <form method="post" action="{{route('staff.destroy',$staff)}}">
                                @csrf
                                @method('delete')
                                <button type="submit"  onclick="confirm('are you sure?')" class="pe-lg-3 p-2 me-lg-2 text-white bg-danger d-inline-block mb-3 text-center">
                                    <i class="fas fa-trash"></i>delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        @endforeach
        
        
    </div>


@endsection
