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
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Upload Farm Live Images/Video</h3>
                                </div>
                                <div class="card-body">
                                  
                              
                                        <div class="row mb-3">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <select required class="form-select" aria-label="Default select example" name="farm_register_id" id="farm_crop_id">
                                                    <option value="" selected> select Farm Tools</option>
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
                                            <div class="col-md-3"></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-3"></div>
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
                                            <div class="col-md-3"></div>
                                        </div>

                                        <div class="row mb-3 media-type image-fields">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <label for="image_upload">Upload Image:</label>
                                                <input type="file" class="form-control" id="image_upload" name="image_upload">
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>

                                        <div class="row mb-3 media-type video-fields" style="display: none;">
                                            <div class="col-md-6">
                                                <h2>Preview</h2>
                                                <video id="preview" width="160" height="120" autoplay muted></video><br/><br/>
                                                <div class="btn-group">
                                                    <div id="startButton" class="btn btn-success"> Start </div>
                                                    <div id="stopButton" class="btn btn-danger" style="display:none;"> Stop </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="recorded" style="display:none">
                                                <h2>Recording</h2>
                                                <video id="recording" width="160" height="120" controls></video><br/><br/>
                                                <a id="downloadButton" class="btn btn-primary" data-url="{{route('farmUpload.store')}}">Save</a>
                                                <a id="downloadLocalButton" class="btn btn-primary">Download</a>
                                            </div>
                                        </div>zz

                                        <div class="row mb-3">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary btn-block">Upload Image/Video</button>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- <script>
        // CSRF for all ajax call
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

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

    <script>
        let preview = document.getElementById("preview");
        let recording = document.getElementById("recording");
        let startButton = document.getElementById("startButton");
        let stopButton = document.getElementById("stopButton");
        let downloadButton = document.getElementById("downloadButton");
        let recorded = document.getElementById("recorded");
        let downloadLocalButton = document.getElementById("downloadLocalButton");

       let  farm_crop_id =document.getElementById("farm_crop_id");

       

        let recordingTimeMS = 5000; //video limit 5 sec
        var localstream;

        window.log = function (msg) {
            console.log(msg);
        }

        window.wait = function (delayInMS) {
            return new Promise(resolve => setTimeout(resolve, delayInMS));
        }

        window.startRecording = function (stream, lengthInMS) {
            let recorder = new MediaRecorder(stream);
            let data = [];

            recorder.ondataavailable = event => data.push(event.data);
            recorder.start();
            log(recorder.state + " for " + (lengthInMS / 1000) + " seconds...");

            let stopped = new Promise((resolve, reject) => {
                recorder.onstop = resolve;
                recorder.onerror = event => reject(event.name);
            });

            let recorded = wait(lengthInMS).then(
                () => recorder.state == "recording" && recorder.stop()
            );

            return Promise.all([
                stopped,
                recorded
            ]).then(() => data);
        }

        window.stop = function (stream) {
            stream.getTracks().forEach(track => track.stop());
        }

        var formData = new FormData();
        if (startButton) {
            startButton.addEventListener("click", function () {
                startButton.innerHTML = "recording...";
                recorded.style.display = "none";
                stopButton.style.display = "inline-block";
                downloadButton.innerHTML = "rendering...";
                navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: true
                }).then(stream => {
                    preview.srcObject = stream;
                    localstream = stream;
                    preview.captureStream = preview.captureStream || preview.mozCaptureStream;
                    return new Promise(resolve => preview.onplaying = resolve);
                }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
                .then(recordedChunks => {
                    let recordedBlob = new Blob(recordedChunks, {
                        type: "video/webm"
                    });
                    recording.src = URL.createObjectURL(recordedBlob);

                 

                    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                    formData.append('video', recordedBlob);
                    formData.append('farm_register_id', farm_crop_id.value);
                    formData.append('media_type', document.querySelector('input[name="media_type"]:checked').value);

                    downloadLocalButton.href = recording.src;
                    downloadLocalButton.download = "RecordedVideo.webm";
                    log("Successfully recorded " + recordedBlob.size + " bytes of " + recordedBlob.type + " media.");
                    startButton.innerHTML = "Start";
                    stopButton.style.display = "none";
                    recorded.style.display = "block";
                    downloadButton.innerHTML = "Save";
                    localstream.getTracks()[0].stop();
                }).catch(log);
            }, false);
        }

        if (downloadButton) {
            downloadButton.addEventListener("click", function () {
                $.ajax({
                    url: this.getAttribute('data-url'),
                    method: 'POST',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-Token': getCSRFToken() // Include the CSRF token in the request headers
                    },
                    success: function (res) {
                        if (res.success) {
                            location.reload();
                        }
                    }
                });
            }, false);
        }

        if (stopButton) {
            stopButton.addEventListener("click", function () {
                stop(preview.srcObject);
                startButton.innerHTML = "Start";
                stopButton.style.display = "none";
                recorded.style.display = "block";
                downloadButton.innerHTML = "Save";
                localstream.getTracks()[0].stop();
            }, false);
        }

        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }
    </script>
</main>
@endsection
