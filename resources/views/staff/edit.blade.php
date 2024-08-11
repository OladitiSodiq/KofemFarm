@extends('layout')
@section('content')
    {{-- <main>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit the Category</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('category.update',$category)}}">
                                            @csrf
                                            @method('put')
                                            <div class="row mb-3">

                                            <div class="col-md-3">
                                            </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputFirstName" type="text" placeholder="Enter your category name" name="name" value="{{$category->name}}" />
                                                        <label for="inputFirstName">Crop name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <select class="form-select" aria-label="Default select example" name="parent_category_id">
                                                        <option value="" selected> select parent</option>
                                                        @foreach($mains as $main)
                                                            <option value="{{$main->id}}"
                                                           @selected($main->id==$category->parent_category_id) >{{$main->name}}</option>
                                                        @endforeach
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea  class="form-control" id="inputDescription" type="text" placeholder="write a brief something about the category" name="description">{{$category->description}}</textarea>
                                                <label for="inputDescription">Description</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block" ><strong>Update</strong></button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('category.index')}}">Want to see your categories?</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </main> --}}

    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">Edit Staff</p>
            <p>Update the details of your staff member in the farm management system.</p>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{ route('staff.index') }}" class="btn bg-success text-white p-2 px-4">
                View Staff<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        <form id="staffForm" action="{{ route('staff.update', $staff->id) }}" method="post">
            @csrf
            @method('PUT')
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="{{ old('fullname', $staff->name) }}" required>
                        <label for="fullname">Full Name</label>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="{{ old('position', $staff->position) }}" required>
                        <label for="position">Position</label>
                    </div>
                </div>
            </div>
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $staff->phone_number) }}" required>
                        <label for="phone_number">Phone Number</label>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email', $staff->email) }}" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>
            </div>
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" value="{{ old('start_date', $staff->start_date) }}" required>
                        <label for="start_date">Start Date</label>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Contact Address" value="{{ old('address', $staff->address) }}" required>
                        <label for="address">Contact Address</label>
                    </div>
                </div>
            </div>
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" placeholder="Emergency Contact Name" value="{{ old('emergency_contact_name', $staff->emergency_contact_name) }}" required>
                        <label for="emergency_contact_name">Emergency Contact Name</label>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="emergency_contact_number" name="emergency_contact_number" placeholder="Emergency Contact Number" value="{{ old('emergency_contact_number', $staff->emergency_contact_number) }}" required>
                        <label for="emergency_contact_number">Emergency Contact Number</label>
                    </div>
                </div>
            </div>
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password (Leave blank to keep current)</label>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                </div>
            </div>
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" value="{{ old('account_name', $staff->account_name) }}" required>
                        <label for="account_name">Account Name</label>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" value="{{ old('account_number', $staff->account_number) }}" required>
                        <label for="account_number">Account Number</label>
                    </div>
                </div>
            </div>
    
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="{{ old('bank_name', $staff->bank_name) }}" required>
                        <label for="bank_name">Bank Name</label>
                    </div>
                </div>
            </div>
    
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 150px">{{ old('description', $staff->description) }}</textarea>
                <label for="description">Staff Description</label>
            </div>
    
            <div class="col">
                <button type="submit" class="btn btn-success w-100">Update Staff</button>
            </div>
        </form>
    </div>
    
@endsection
