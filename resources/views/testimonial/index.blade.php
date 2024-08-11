@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mt-md-0">
            <h1>Testimonials</h1>
            <a href="{{ route('settings.create_testimonial') }}" class="btn bg-success text-white p-2 px-4 mt-2">Add Testimonials</a>
        </div>
    </div>
    <div class="row mt-4">
        @foreach($testimonialSettings as $testimonial)
            <div class="col-md-4 mb-4">
               
            <div class="testimonial-item text-center text-green">
                <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4"  src="{{asset('assets/assets/Landing-page/img/'.$testimonial->image.'')}}" alt="">
                <p class="fs-5">{{$testimonial->feedback}}.</p>
                <hr class="mx-auto w-25">
                <h4 class="text-green mb-3">{{$testimonial->name}}</h4>
            </div>
            <a href="{{ route('settings.edit_testimonial', ['id' => $testimonial->id]) }}" class="btn btn-primary">Edit</a>
                   
            </div>
        @endforeach
    </div>
</div>
@endsection
