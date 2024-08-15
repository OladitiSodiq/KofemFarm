@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mt-md-0">
            <h1>Upload Farm Live Images/Video</h1>
        </div>
    </div>
    <form action="{{ route('farmUpload.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="farm_crop_id">Select Farm Tools</label>
                    <select required class="form-select" aria-label="Default select example" name="farm_register_id" id="farm_crop_id">
                        <option value="" selected>Select Farm Tools</option>
                        @foreach($farm_registers as $farm_register)
                        @php
                            $FarmCrop = \App\Models\Farm_crop::where('id', $farm_register->farm_crop_id)->first();
                            $category = \App\Models\Category::where('id', $farm_register->category_id)->first();
                            $farmname = \App\Models\Farm::where('id', $FarmCrop->farm_id)->first();
                            $cropname = \App\Models\Crop::where('id', $FarmCrop->crop_id)->first();
                        @endphp
                        <option value="{{$farm_register->id}},{{$farmname->id}}">
                            {{$farmname->name}}.-.{{$cropname->name}}.-.{{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class=" mb-3">
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
            </div>
            <div class="col-md-8">
                

                <div class="media-type image-fields mb-3">
                    <label for="image_upload">Upload Image:</label>
                    <input type="file" class="form-control" id="image_upload" name="image_upload">
                    <img id="image-preview" src="#" alt="Image Preview" class="img-thumbnail mt-2" style="display: none; width: 100%;">
                </div>

                <div class="media-type video-fields mb-3" style="display: none;">
                    <label for="videoPreview">Record Video:</label>
                    <video id="videoPreview" autoplay></video>
                    <div class="controls">
                        <button type="button" id="startRecording" class="btn btn-success">🔴 Start Recording</button>
                        <button type="button" id="stopRecording" class="btn btn-danger" disabled>⏹️ Stop Recording</button>
                    </div>
                    <a id="downloadLink" class="download-link" style="display: none;">⬇️ Download Video</a>
                </div>

                <div class="col mt-4 media-type image-fields">
                    <button type="submit" class="btn btn-success w-100">Upload Image/Video</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function loadPreview(input) {
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
            preview.src = '';
        }
    }

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

        const videoPreview = document.getElementById("videoPreview");
        const startRecordingButton = document.getElementById("startRecording");
        const stopRecordingButton = document.getElementById("stopRecording");
        const downloadLink = document.getElementById("downloadLink");

        let mediaRecorder;
        let recordedChunks = [];

        startRecordingButton.addEventListener("click", startRecording);
        stopRecordingButton.addEventListener("click", stopRecording);

        async function startRecording() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });

                videoPreview.srcObject = stream;
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = (event) => {
                    if (event.data.size > 0) {
                        recordedChunks.push(event.data);
                    }
                };

                mediaRecorder.onstop = () => {
                    const videoBlob = new Blob(recordedChunks, { type: "video/webm" });
                    recordedChunks = [];

                    const videoURL = URL.createObjectURL(videoBlob);
                    downloadLink.href = videoURL;
                    downloadLink.style.display = "block";
                    downloadLink.download = "recorded-video.webm";

                    uploadVideo(videoBlob);
                };

                mediaRecorder.start();
                startRecordingButton.disabled = true;
                stopRecordingButton.disabled = false;
            } catch (error) {
                console.error("Error starting recording:", error);
            }
        }

        function stopRecording() {
            if (mediaRecorder && mediaRecorder.state === "recording") {
                mediaRecorder.stop();
                startRecordingButton.disabled = false;
                stopRecordingButton.disabled = true;
            } else {
                console.error("MediaRecorder is not recording.");
            }
        }

        function uploadVideo(videoBlob) {
            console.log("Uploading video...");
            const formData = new FormData();
            formData.append('farm_register_id', $('#farm_crop_id').val());
            formData.append('media_type', document.querySelector('input[name="media_type"]:checked').value);
            formData.append('video', videoBlob, 'recorded-video.webm');

            $.ajax({
                url: '{{ route('farmUpload.store') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log('Upload successful:', response);
                    alert('Video uploaded successfully!');
                },
                error: function (xhr) {
                    console.error('Error uploading video:', xhr);
                    console.error('Response:', xhr.responseText);
                }
            });
        }
    });
</script>
@endsection
