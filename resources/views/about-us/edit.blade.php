@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <h1>Edit About Us Settings</h1>
        </div>
    </div>
    <div class="mt-4">
        <form action="{{ route('settings.about_us_post') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter About Us" id="about_us" name="about_us" style="height: 150px">{{ $settings->about_us ?? '' }}</textarea>
                <label for="about_us">About Us</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter Our Mission" id="our_mission" name="our_mission" style="height: 150px">{{ $settings->our_mission ?? '' }}</textarea>
                <label for="our_mission">Our Mission</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Enter Our Vision" id="our_vision" name="our_vision" style="height: 150px">{{ $settings->our_vision ?? '' }}</textarea>
                <label for="our_vision">Our Vision</label>
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if(isset($settings->image))
                    <img src="{{asset('assets/assets/Landing-page/img/'.$settings->image.'')}}" alt="Current Image" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <div class="col">
                <button type="submit" class="btn btn-success w-100">Save</button>
            </div>

        </form>
    </div>
</div>
@endsection
