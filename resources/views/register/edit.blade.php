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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Register</h3></div>
                                    <div class="card-body">
                                        <form method="Post" action="{{route('farm_register.update', $farm_register)}}">
                                            
                                            @method('put')
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputName" type="text" placeholder="Enter your farm id" name="farm_crop_id" value="{{$farm_register->farm_crop_id}}"/>
                                                        <label for="inputName">Farm crop id</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="iputid" type="text" placeholder="Enter the crop id" name="category_id" value="{{$farm_register->category_id}}" />
                                                        <label for="iputid">category id</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputdate" type="text" placeholder="Enter the date" name="total_cost" value="{{$farm_register->total_cost}}" />
                                                        <label for="inputdate">total cost</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputDuration" type="text" placeholder="who harvested" name="quantity" value="{{$farm_register->quantity}}"/>
                                                        <label for="inputDuration">quantity</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea required class="form-control" id="inputFirstName" type="number" placeholder="year planted" name="description">value="{{$farm_register->description}}"</textarea>
                                                        <label for="inputFirstName">Description</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputDuration" type="date" placeholder="State the status" name="date_created" value="{{$farm_register->date_created}}"/>
                                                        <label for="inputDuration">date created</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Update</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('farm_register.index')}}">Want to see your Register?</a></div>
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
            <p class="heading-1">Edit Farm Activity</p>
            <p class="">Edit activities for your farm by providing details such as crop type, activity category, total cost, and date. Maintain accurate records to streamline your farm management and track operational expenses.</p>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{route('farm_register.index')}}" class="btn bg-success text-white p-2 px-4">
                View Farm Activities<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        <form method="Post" action="{{route('farm_register.update', $farm_register)}}">
                                            
            @method('put')
            @csrf
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" name="" id="floatingSelect" aria-label="Floating label select example" disabled>
                            <option disabled selected>Please select...</option>
                            @foreach($FarmCrops as $FarmCrop)
                                <option value="{{$FarmCrop->id}}"   @selected($farm_register->farm_crop_id==$FarmCrop->id)>
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
                <input type="hidden" value="{{$farm_register->farm_crop_id  }}" name="farm_crop_id"/>
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example" required>
                        <option disabled selected>Please select...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"  @selected($category->id==$farm_register->category_id)>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select category</label>
                    </div>
                </div>
            </div>
        
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                    <input type="number"  name="total_cost" value="{{$farm_register->total_cost}}" class="form-control" id="floatingInputGrid" placeholder="farm-size" required>
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
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"> value="{{$farm_register->description}}"</textarea>
                <label for="floatingTextarea2">Farm Activities Description</label>
            </div>
    
            <div class="col">
                <button type="submit" class="btn btn-success w-100">Update Farm Activity</button>
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
