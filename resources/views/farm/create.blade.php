@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">Add Farm</p>
            <p class="">Please provide detailed information about the farm, including its name, location, and key characteristics. This information will help us to keep track of the farm operations and improve productivity.</p>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{route('farm.index')}}" class="btn bg-success text-white p-2 px-4">
                View farm<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        <form method="post" action="{{route('farm.store')}}">
            @csrf
            <div class="row g-2 mb-3">
                <div class="col-md">
                <div class="form-floating">
                    <input type="name" class="form-control" id="floatingInputGrid" placeholder="farm name" name="name" required>
                    <label for="floatingInputGrid">Farm Name</label>
                </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputGrid"  name="size" placeholder="farm-size" required>
                    <label for="floatingInputGrid">Farm Size &#40;Acres&#41;</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="name" class="form-control" id="floatingInputGrid" placeholder="farm name" name="location" required>
                <label for="floatingInputGrid">Farm Location</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                <label for="floatingTextarea2">Farm Description</label>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-success w-100">Add Farm</button>
            </div>

        </form>
           
            
    </div>

@endsection
