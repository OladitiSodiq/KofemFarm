@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <h1>About Us Settings</h1>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{ route('settings.edit_about_us') }}" class="btn bg-success text-white p-2 px-4">
                Edit Settings<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        @if ($settings)
            <div class="card">
                <div class="card-body">
                    <h2>About Us</h2>
                    <p>{{ $settings->about_us }}</p>

                    <h2>Our Mission</h2>
                    <p>{{ $settings->our_mission }}</p>

                    <h2>Our Vision</h2>
                    <p>{{ $settings->our_vision }}</p>

                    @if($settings->image)
                        <h2>Image</h2>
                        <img src=" {{asset('assets/assets/Landing-page/img/'.$settings->image.'')}}" alt="About Us Image" class="img-thumbnail" width="150">
                    @endif
                </div>
            </div>
        @else
            <p>No settings found. Please <a href="{{ route('settings.edit_about_us') }}">add settings</a>.</p>
        @endif
    </div>
</div>
@endsection
