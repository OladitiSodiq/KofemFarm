@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">Add Staff</p>
            <p>Enter details to add new staff members to your farm management system and enhance your workforce.</p>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{ route('staff.index') }}" class="btn bg-success text-white p-2 px-4">
                View Staff<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        <form id="staffForm" action="{{ route('staff.store') }}" method="post">
            @csrf

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                        <label for="fullname">Full Name</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>
                        <label for="position">Position</label>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                        <label for="phone_number">Phone Number</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" required>
                        <label for="start_date">Start Date</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Contact Address" required>
                        <label for="address">Contact Address</label>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" placeholder="Emergency Contact Name" required>
                        <label for="emergency_contact_name">Emergency Contact Name</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="emergency_contact_number" name="emergency_contact_number" placeholder="Emergency Contact Number" required>
                        <label for="emergency_contact_number">Emergency Contact Number</label>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" required>
                        <label for="account_name">Account Name</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" required>
                        <label for="account_number">Account Number</label>
                    </div>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" required>
                        <label for="bank_name">Bank Name</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 150px"></textarea>
                <label for="description">Staff Description</label>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-success w-100">Add Staff</button>
            </div>

        </form>
    </div>
</div>
@endsection
