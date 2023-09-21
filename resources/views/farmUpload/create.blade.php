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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Upload Farm Live Images/Video</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('farmUpload.store')}}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <select required class="form-select" aria-label="Default select example" name="farm_register_id" id="farm_crop_id">
                                                        <option value="" selected> select Farm Tools</option>
                                                        @foreach($farm_registers as $farm_register)

                                                        @php


                                                        $FarmCrop  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();


                                                        $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();
                                                            $farmname = \App\Models\farm::where('id',$FarmCrop->farm_id)->first();
                                                            $cropname = \App\Models\crop::where('id',$FarmCrop->crop_id)->first();
                                                        @endphp
                                                            <option value="{{$farm_register->id}},{{$farmname->id}}">
                                                          
                                                              
                                                            {{$farmname->name}}.-.{{$cropname->name}}.-.{{ $category->name}}
                                                        
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="col-md-3">
                                                </div>
                                                
                                            </div>
                                        
                                               
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="media_type">Upload Media Type:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="media_type" value="image" checked>
                                                        <label class="form-check-label">Image</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="media_type" value="video">
                                                        <label class="form-check-label">Video</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                </div>
                                            </div>

                                            <div class="row mb-3 media-type image-fields">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="image_upload">Upload Image:</label>
                                                    <input type="file" class="form-control" id="image_upload" name="image_upload">
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                            </div>

                                            <!-- Video Upload Fields (Initial State: Hidden) -->
                                            <div class="row mb-3 media-type video-fields" style="display: none;">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="video_upload">Upload Video:</label>
                                                    <input type="file" class="form-control" id="video_upload" name="video_upload">
                                                </div>

                                                <div class="col-md-3">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Upload Image/Video</button></div>


                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                            </div>

                                               

                                            
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('register.index')}}">Want to see your Uploads?</a></div>
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

                $('input[name="media_type"]').change(function () {
                    var mediaType = $(this).val();
                    var imageFields = $('.media-type.image-fields');
                    var videoFields = $('.media-type.video-fields');

                    if (mediaType === 'image') {
                        imageFields.show();
                        videoFields.hide();
                    } else if (mediaType === 'video') {
                        imageFields.hide();
                        videoFields.show();
                    }
                });
            });
        </script>
    </main>
@endsection
