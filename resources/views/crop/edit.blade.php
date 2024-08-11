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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit the Crop</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('crop.update',$crop)}}">
                                            @csrf
                                            @method('put')
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputFirstName" type="text" placeholder="Enter your crop name" name="name" value="{{$crop->name}}" />
                                                        <label for="inputFirstName">Crop name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputDuration" type="string" placeholder="State the duration" name="duration" value="{{$crop->duration}}"/>
                                                        <label for="inputDuration">Duration</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea required class="form-control" id="inputDescription" type="text" placeholder="write a brief something about the crop" name="description">{{$crop->description}}</textarea>
                                                <label for="inputDescription">Description</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block" ><strong>Update</strong></button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('crop.index')}}">Want to see your crops?</a></div>
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
            <p class="heading-1">Edit Crop</p>
            <p class="">Edit a new crop by entering its name, duration, and description. Provide detailed information to help manage and track the growth cycle and characteristics of your crops.</p>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{route('crop.index')}}" class="btn bg-success text-white p-2 px-4">
                View Crops<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        <form method="post" action="{{route('crop.update',$crop)}}">
            @csrf
            @method('put')
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" name="name"  value="{{$crop->name}}" placeholder="Crop Name" required>
                    <label for="floatingInputGrid">Crop Name</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" name="duration"  value="{{$crop->duration}}" placeholder="Crop Duration" required>
                    <label for="floatingInputGrid">Crop Duration &#40;in months&#41;</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" name="description" id="floatingTextarea2" style="height: 150px"> {{$crop->description}} </textarea>
                <label for="floatingTextarea2">Crop Description</label>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-success w-100">Update Crop</button>
            </div>

        </form>
        
            
    </div>
@endsection
