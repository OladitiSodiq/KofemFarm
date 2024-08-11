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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Farm Tools</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('farm_register.store')}}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <select required class="form-select" aria-label="Default select example" name="farm_crop_id" id="farm_crop_id">
                                                        <option value="" selected> select Farm Tools</option>
                                                        @foreach($farm_registers as $farm_register)
                                                            <option value="{{$farm_register->id}}">
                                                            @php


                                                            $FarmCrop  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();
                                                          
                                                           
                                                            $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();
                                                                $farmname = \App\Models\farm::where('id',$FarmCrop->farm_id)->first();
                                                                $cropname = \App\Models\crop::where('id',$FarmCrop->crop_id)->first();
                                                            @endphp
                                                              
                                                            {{$farmname->name}}.-.{{$cropname->name}}.-.{{ $category->name}}
                                                        
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputdate" type="text" placeholder="Enter the date" name="quantity"  />
                                                        <label for="inputdate">Quantity</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-3">
                                                <!-- <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea required class="form-control" id="inputFirstName" type="number" placeholder="year planted" name="description"></textarea>
                                                        <label for="inputFirstName">Description</label>
                                                    </div>
                                                </div> -->

                                               

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Create Tool</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('farm_register.index')}}">Want to see your Tools?</a></div>
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
