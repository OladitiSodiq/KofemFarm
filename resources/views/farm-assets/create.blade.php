@extends('layout')

@section('content')
<div class="row ">
    <div class="col-md-8 mt-3 mt-md-0">
        <p class="heading-1">Add Farm Assets</p>
        <p class="">Register new assets for your farm by providing detailed information. Keep track of your farm equipment and resources to ensure efficient asset management and maintenance.</p>
    </div>
    <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <a href="view-farm-assets.html" class="btn bg-success text-white p-2 px-4">
            View Farm Assets<i class="fa-regular fa-eye ps-2"></i>
        </a>
    </div>
</div>
<div class="mt-4">
    <form method="post"  action="{{ route('save.storeStock') }}" >
        @csrf
         <input type="hidden" name="_token" value="{{ csrf_token() }}">

         @php
         $Assets  =\App\Models\Asset::all();
         
       @endphp
       @foreach($Assets as $Asset)
           <option value="{{$Asset->id}}">
         
           {{$Asset->name}}
       
       </option>
       @endforeach

        <div class="form-floating mb-3">
           
            <select class="form-select"  id="floatingSelect" aria-label="Floating label select example" name="asset_id" id="asset_id" required>
                <option disabled selected>Please select...</option>
                @php
                    $Assets  =\App\Models\Asset::all();
                    
                @endphp
                @foreach($Assets as $Asset)
                    <option value="{{$Asset->id}}">{{$Asset->name}}</option>
                @endforeach
            </select>
            <label for="assetsName">Farm Assets Name</label>
        </div>

        <div class="form-floating mb-3">
           
            <select class="form-select"  id="floatingSelect" aria-label="Floating label select example" name="activity_id" id="activity_id" required>
                <option disabled selected>Please select...</option>

                @php
                $FarmCrops =   $farmData = DB::table('farm_crops')
                  ->join('crops', 'farm_crops.crop_id', '=', 'crops.id')
                  ->join('farms', 'farm_crops.farm_id', '=', 'farms.id')
                  ->join('farm_registers', 'farm_crops.id', '=', 'farm_registers.farm_crop_id')

                  ->join('categories','farm_registers.category_id' , '=', 'categories.id'  )

                  ->where('farm_crops.farm_id', $farm->id)
                  ->select('farms.id as farmid', 'farms.name as farmnae' ,'crops.name as cropname','categories.name as operations','farm_registers.id as id')->get();

                @endphp
              
                @foreach($FarmCrops as $FarmCrop)
                    <option value="{{$FarmCrop->id}}"> {{$FarmCrop->farmnae}}.-.{{$FarmCrop->cropname}}.-.{{ $FarmCrop->operations}}</option>
                @endforeach
            </select>
            <label for="assetsName">Farm Activity </label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="assetsQuantity" name="quantity" placeholder="category Name" required>
            <label for="assetsQuantity">Quantity</label>
        </div>

        <div class="form-floating mb-3">
            <input required class="form-control" id="inputAsset" disabled type="text" placeholder="" name="inputAsset">
            <label for="assetsDescription">Available Farm Assets</label>
        </div>

        <input id="stockid" name="stockid" type="hidden">
        <input id="farm_id" name="farm_id" type="hidden" value="{{$farm->id}}">

        <input id="assetprice" name="assetprice" type="hidden">

    <div class="col">
        <button type="submit" class="btn btn-success w-100">Add Farm Assets</button>
    </div>

   </form>
       
        
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#asset_id').change(function () {
            var assetid = $(this).val();
            var inputAsset = $('#inputAsset');
            var stockid = $('#stockid');
            var assetprice= $('#assetprice');

            stockid

            if (assetid) {
                $.ajax({
                    url: '/Farm'+'/get-assets-details/' + assetid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                    stockid.val(data.stockid);
                    // console.log(data);
                        assetprice.val(data.price);
                        inputAsset.val("Price: "+data.price+" Quantity:"+data.current_stock);
                        inputAsset.prop('readonly', true);
                    },
                    error: function () {
                        inputAsset.val('');
                        inputAsset.prop('readonly', false);
                    }
                });
            } else {
                inputAsset.val('');
                inputAsset.prop('readonly', false);
            }
        });
    });
</script>
@endsection
	