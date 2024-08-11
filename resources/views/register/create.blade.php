@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-8 mt-3 mt-md-0">
        <p class="heading-1">Add Farm Activity</p>
        <p class="">Log new activities for your farm by providing details such as crop type, activity category, total cost, and date. Maintain accurate records to streamline your farm management and track operational expenses.</p>
    </div>
    <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <a href="{{route('farm_register.index')}}" class="btn bg-success text-white p-2 px-4">
            View Farm Activities<i class="fa-regular fa-eye ps-2"></i>
        </a>
    </div>
</div>
<div class="mt-4">
    <form method="post" action="{{route('farm_register.store')}}">
        @csrf
    <div class="row g-2 mb-3">
        <div class="col-md">
            <div class="form-floating">
                <select class="form-select" name="farm_crop_id" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled selected>Please select...</option>
                    @foreach($FarmCrops as $FarmCrop)
                        <option value="{{$FarmCrop->id}}">
                        @php
                            $farmname = \App\Models\Farm::where('id',$FarmCrop->farm_id)->first();
                            $cropname = \App\Models\Crop::where('id',$FarmCrop->crop_id)->first();
                        @endphp
                            
                        {{$farmname->name}}.-.{{$cropname->name}}
                    
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Select Farm</label>
            </div>
        </div>
        
        <div class="col-md">
            <div class="form-floating">
                <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example" required>
                  <option disabled selected>Please select...</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Select category</label>
            </div>
        </div>
    </div>

    <div class="row g-2 mb-3">
        <div class="col-md">
            <div class="form-floating">
              <input type="number"  name="total_cost" class="form-control" id="floatingInputGrid" placeholder="farm-size" required>
              <label for="floatingInputGrid">Total Cost</label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating">
              <input type="number" class="form-control" id="inputDuration" placeholder="farm-size" disabled >
              <label for="floatingInputGrid">Farm Land Size</label>
            </div>
        </div>
    </div>

    <div class="form-floating mb-3">
        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
        <label for="floatingTextarea2">Farm Activities Description</label>
    </div>

    <div class="col">
        <button type="submit" class="btn btn-success w-100">Add Farm Activity</button>
      </div>

   </form>
       
        
    </div>

    <script type="text/javascript">
            $(document).ready(function () {
                $('#farm_crop_id').change(function () {
                    var farmCropId = $(this).val();
                    var inputDuration = $('#inputDuration');

                    if (farmCropId) {
                        $.ajax({
                            url: '/Farm'+'/get-duration/' + farmCropId,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                inputDuration.val(data + " Acres");
                                inputDuration.prop('readonly', true);
                            },
                            error: function () {
                                inputDuration.val('');
                                inputDuration.prop('readonly', false);
                            }
                        });
                    } else {
                        inputDuration.val('');
                        inputDuration.prop('readonly', false);
                    }
                });
            });
    </script>
@endsection
