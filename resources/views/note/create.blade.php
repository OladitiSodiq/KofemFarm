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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create a
                                            Note</h3></div>
                                    <div class="card-body">
                                    <form method="post" action="{{route('note.store')}}">
                                        @csrf

                                        @php 
                                        $farms =\App\Models\Farm::all();

                                        @endphp
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="farm_id">
                                                <option value="" selected> select farm</option>
                                                @foreach($farms as $farm)
                                                    <option value="{{$farm->id}}">{{$farm->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-floating mb-3">
                                            <textarea required class="form-control" id="describe"
                                                    type="text"
                                                    placeholder="write a brief something "
                                                    name="notes"></textarea>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                        href="{{route('note.store')}}"> Note
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('note.index')}}">Want to see your Notes?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </main> --}}

    <div class="container-fluid p-3 p-md-4 p-lg-5">
        <div class="row ">
            <div class="col-md-8 mt-3 mt-md-0">
                <p class="heading-1">Add Farm Note</p>
                <p class="">Easily add notes to record important information or observations about your farm. Keep detailed and organized notes to enhance your farm management and decision-making processes.</p>
            </div>
            <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
                <a href="{{route('note.index')}}" class="btn bg-success text-white p-2 px-4">
                    View Farm Notes<i class="fa-regular fa-eye ps-2"></i>
                </a>
            </div>
        </div>
        <div class="mt-4">
            <form method="post" action="{{route('note.store')}}">
                @csrf

                @php 
                $farms =\App\Models\Farm::where('is_deleted', false)->where('staff_id',Auth::User()->id)->get();

                @endphp
            <div class="form-floating mb-3">
                <select name="farm_id" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                    <option disabled selected>Please select...</option>
                    @foreach ( $farms as  $farm )

                        <option value="{{ $farm->id }}">{{ $farm->name }}</option>
                        
                    @endforeach
                   
                    
                  </select>
                  <label for="floatingSelect">Select Farm</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="notes" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                <label for="floatingTextarea2">Write Farm Note</label>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-success w-100">Create Note</button>
            </div>

           </form>
               
                
        </div>
    </div>
@endsection
