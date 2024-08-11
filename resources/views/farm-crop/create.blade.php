@extends('layout')
@section('content')

<div class="row">
    <div class="col-md-8 mt-3 mt-md-0">
        <p class="heading-1">Add Farm Crop</p>
        <p class="">Easily add new crops to your farm by providing details such as the crop type, planting date, and expected harvest date. Keep your farm records up-to-date for better planning and management.</p>
    </div>
    <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <a href="{{route('farm-crop.index')}}" class="btn bg-success text-white p-2 px-4">
            View Farm Crop<i class="fa-regular fa-eye ps-2"></i>
        </a>
    </div>
</div>
<div class="mt-4">
    <form method="post" action="{{route('farm-crop.store')}}">
        @csrf
        <div class="row g-2 mb-3">
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select" name="farm_id" id="floatingSelect" aria-label="Floating label select example" required>
                        <option disabled selected>Please select...</option>
                      
                        @foreach($farms as $farm)
                            <option value="{{$farm->id}}">{{$farm->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Select Farm</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select" name="crop_id" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled selected>Please select...</option>
                        @foreach($crops as $crop)
                            <option value="{{$crop->id}}">{{$crop->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Select Crop</label>
                </div>
            </div>
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md">
            <div class="form-floating">
                <input type="date" name="planted_on" class="form-control" id="floatingInputGrid" placeholder="farm name" required>
                <label for="floatingInputGrid">Planted On</label>
            </div>
            </div>

            <div class="col-md">
                <div class="form-floating">
                <input type="date" name="harvest_by" class="form-control" id="floatingInputGrid" placeholder="farm-size" required>
                <label for="floatingInputGrid">Harvested on</label>
                </div>
            </div>
        </div>

        {{-- <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
            <label for="floatingTextarea2">Crop Description</label>
        </div> --}}

        <div class="col">
            <button type="submit" class="btn btn-success w-100">Add Crop</button>
        </div>

    </form>
       
        
</div> 
 
@endsection
