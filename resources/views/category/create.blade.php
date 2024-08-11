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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create a category</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('category.store')}}">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required class="form-control" id="inputname" type="text" placeholder="Enter your category name" name="name" />
                                                        <label for="inputname">Category name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                        <select class="form-select" aria-label="Default select example" name="parent_category_id">
                                                            <option value="" selected> select parent</option>
                                                            @foreach($mains as $main)
                                                            <option value="{{$main->id}}">{{$main->name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div> -->
                                            </div>
                                            <div class="form-floating mb-3 ">
                                                <textarea required class="form-control" id="inputDescription" type="text" placeholder="write a brief something about the category" name="description" rows="40"></textarea>
                                                <label for="inputDescription">Description</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block" href="{{route('crop.store')}}">Create Category</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('category.index')}}">Want to see your categories?</a></div>
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

    <div class="row ">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">Create Caregories</p>
            <p class="">Add a new category by entering its name and description. Organize your farm activities and crops into categories for better management and tracking.</p>
        </div>
        <div class="col-md-4 d-none d-md-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <a href="{{route('category.index')}}" class="btn bg-success text-white p-2 px-4">
                View Categories<i class="fa-regular fa-eye ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4">
        <form method="post" action="{{route('category.store')}}">
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInputGrid" placeholder="category Name" name="name" required>
            <label for="floatingInputGrid">Category Name</label>
          </div>

        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 150px"></textarea>
            <label for="floatingTextarea2">Category Description</label>
        </div>

        <div class="col">
            <button type="submit" class="btn btn-success w-100">Create Category</button>
        </div>

       </form>
           
            
    </div>
@endsection
