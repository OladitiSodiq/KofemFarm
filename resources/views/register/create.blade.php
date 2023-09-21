@extends('layout')
@section('styles')
<style>
    .custom-dropdown-button {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}
</style>
@endsection

@section('content')
    <main>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Farm Activites</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('register.store')}}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <select required class="form-select" aria-label="Default select example" name="farm_crop_id" id="farm_crop_id">
                                                        <option value="" selected> select Farm Crop</option>
                                                        @foreach($FarmCrops as $FarmCrop)
                                                            <option value="{{$FarmCrop->id}}">
                                                            @php
                                                                $farmname = \App\Models\farm::where('id',$FarmCrop->farm_id)->first();
                                                                $cropname = \App\Models\crop::where('id',$FarmCrop->crop_id)->first();
                                                            @endphp
                                                              
                                                            {{$farmname->name}}.-.{{$cropname->name}}
                                                        
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <select required class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                                                        <option value="" selected> select category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputdate" type="text" placeholder="Enter the date" name="total_cost"  />
                                                        <label for="inputdate">total cost</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputDuration" type="text"    placeholder="who harvested" name=""/>
                                                        <label for="inputDuration">Farm Land Size</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea required class="form-control" id="inputFirstName" type="number" placeholder="year planted" name="description"></textarea>
                                                        <label for="inputFirstName">Description</label>
                                                    </div>
                                                </div>

                                               

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Create Activities</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('register.index')}}">Want to see your Activities?</a></div>
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

        <script type="text/javascript">
        $(document).ready(function () {
            $('#farm_crop_id').change(function () {
                var farmCropId = $(this).val();
                var inputDuration = $('#inputDuration');

                if (farmCropId) {
                    $.ajax({
                        url: '/get-duration/' + farmCropId,
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
    </main>
@endsection
