
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/resources/img/kofem_logo.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('assets/resources/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/resources/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/resources/fontawesome/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('assets/resources/fontawesome/css/solid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('assets/resources/DataTable/jquery.dataTables.min.css')}}">

    <script src="{{asset('assets/resources/jQuery/jquery.js')}}"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}" />

   
    <title>KOFEM - Farm Manager</title>
</head>
<body>

    <div class="main">
        @include('sweetalert::alert')
        <section id="sidebar" class="py-3">
            <a href="/" class="d-flex align-items-center justify-content-center py-3 my-3 text-decoration-none">
                <img src="{{asset('assets/resources/img/kofem_logo.png')}}" alt="KOFEM Logo" class="w-50">
            </a>
    
            <ul class="nav nav-pills flex-column mb-auto">
            
                <li class="dropdown {{  Route::is('dashboard') ? 'active' : '' }}">


                    <a href="{{route('dashboard')}}" class="nav-link text-white">
                        <i class="fa-regular fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
                {{-- {{route('farm.index')}},{{route('crop.index')}},{{route('category.index')}} --}}
                <li class="dropdown {{  Route::is('farm.index') || Route::is('farm-crop.index') || Route::is('farm_register.index') || Route::is('farmUpload.index') ||  Route::is('note.index')  ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="manageFarmToggle">
                        <i class="fa-regular fa-bars-progress"></i>
                        Manage Farm
                    </a>
                    <ul class="d-none drop-menu {{  Route::is('farm.index') || Route::is('farm-crop.index') ||  Route::is('farm_register.index') || Route::is('farmUpload.index') ||  Route::is('note.index')  ? 'active' : '' }}" id="manageFarmDropdown">
                        <li><a class="" href="{{route('farm.index')}}"><i class="fa-regular fa-binoculars"></i>Farm Overview</a></li>
                        <li><a class="" href="{{route('farm-crop.index')}}"><i class="fa-regular fa-leaf"></i>Farm Crop</a></li>
                        <li><a class="" href="{{route('farm_register.index')}}"><i class="fa-regular fa-list-check"></i>Farm Activities</a></li>
                        <li><a class="" href="{{route('farmUpload.index')}}"><i class="fa-regular fa-cloud-arrow-up"></i>Farm Upload</a></li>
                        <li><a class="" href="{{route('note.index')}}"><i class="fa-regular fa-book"></i>Farm Notes</a></li>
                    </ul>
                </li>
    
                <li class="dropdown {{  Route::is('crop.index') || Route::is('crop.create')  ? 'active' : '' }}">
                    <a href="{{route('crop.index')}}" class="nav-link text-white dropdown-toggle" id="manageCropsToggle">
                        <i class="fa-regular fa-wheat-awn"></i>
                        Manage Crops
                    </a>
                    <ul class="d-none drop-menu" id="manageCropsDropdown">
                        <li><a class="" href="{{route('crop.create')}}"><i class="fa-regular fa-plus"></i>Add Crops</a></li>
                        <li><a class="" href="{{route('crop.index')}}"><i class="fa-regular fa-eye"></i>View Crops</a></li>
                    </ul>
                </li>
    
                <li class="dropdown {{  Route::is('category.index') || Route::is('category.create') ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="farmActivitiesToggle">
                        <i class="fa-regular fa-tractor"></i>
                        Farm Categories
                    </a>
                    <ul class="d-none drop-menu" id="farmActivitiesDropdown">
                        <li class="{{   Route::is('category.create') ? 'active' : '' }}"><a href="{{route('category.create')}}"><i class="fa-regular fa-plus"></i>Add Category</a></li>
                        <li class="{{  Route::is('category.index')  ? 'active' : '' }}"><a  href="{{route('category.index')}}"><i class="fa-regular fa-eye"></i>View Category</a></li>
                    </ul>
                </li>
            </ul>
        </section>



        <section id="content">
            <!-- Header -->
            <div class="container-fluid p-0">

                <!-- Header  -->
                <div class=" search  d-flex justify-content-between align-items-center">
                    <!-- search box -->
                    <div class="col">
                      <span class="bars d-md-none pe-3">
                        <i class="fa-regular fa-bars"  style="font-size: 30px;"></i>
                      </span>
                    </div>
                    <div class="search-box col-md-4">
                      <form action="post">
                        <div class="input-group input-group-sm">
                          <input type="text" class="form-control py-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Search here">
                          <input type="submit" class="input-group-text btn btn-success" id="inputGroup-sizing-sm" value="Search">
                        </div> 
                      </form>
                      
                    </div>
                    <!-- search box -->
        
                    
  
                    <!-- User details -->
                    <div class="dropdown user-details col-md-4 d-flex justify-content-end align-items-center">
                      <h5 class="m-0 d-none d-md-flex align-items-center">Admin</h5>
                      <a href="#" class="d-flex align-items-center justify-content-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset('assets/resources/img/02.jpg')}}" alt="user" width="40px" height="auto" class="ms-3">
                      </a>
  
                      <ul class="dropdown-menu text-small shadow">
                          <li><a class="dropdown-item" href="#">New project...</a></li>
                          <li><a class="dropdown-item" href="#">Settings</a></li>
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                    <!-- User details -->
                </div>
                <!-- Header  -->
            </div>

            <!-- body -->
            <div class="container-fluid p-3 p-md-4 p-lg-5">
                @yield('content')
            </div>
        </section>
    
        
    </div>
    
    <script src="{{asset('assets/resources/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/script.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="{{asset('assets/resources/DataTable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/resources/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    {{-- <script src="{{asset('assets/assets/js/script.js')}}"></script> --}}
</body>
</html>