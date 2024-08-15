{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Farm</title>
 
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
 
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{asset('https://code.jquery.com/jquery-3.5.1.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('https://use.fontawesome.com/releases/v6.1.0/js/all.js')}}" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('sweetalert::alert')
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#">Farm Manager</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                   aria-describedby="btnNavbarSearch"/>
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link" href="{{route('farm.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tree"></i></div>
                        Farm
                    </a>
                    <a class="nav-link" href="{{route('crop.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-leaf"></i></div>
                        Crop
                    </a>

                    <a class="nav-link" href="{{route('category.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                        Categories
                    </a>



                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                farm manager
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">

        @yield('content')

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">   </div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#describe').summernote({
            placeholder: 'Write a little something about your farm',
            tabsize: 2,
            height: 100
        })
    });
</script>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{asset('js/scripts.js')}}"></script>



</body>
</html> --}}

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
                <li class="dropdown {{  Route::is('farm.index') || Route::is('farm-crop.index') || Route::is('farm_register.index') || Route::is('farmUpload.index') ||  Route::is('note.index') || Route::is('farm.show')  ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="manageFarmToggle">
                        <i class="fa-regular fa-bars-progress"></i>
                        Manage Farm
                    </a>
                    <ul class="d-none drop-menu {{  Route::is('farm.index') || Route::is('farm-crop.index') ||  Route::is('farm_register.index') || Route::is('farmUpload.index') ||  Route::is('note.index') || Route::is('farm.show') ? 'active' : '' }}" id="manageFarmDropdown">
                        <li class="{{   Route::is('farm.index')  || Route::is('farm.create') ||  Route::is('farm.edit') || Route::is('farm.show') ? 'active' : '' }}"><a class="" href="{{route('farm.index')}}"><i class="fa-regular fa-binoculars"></i>Farm Overview</a></li>
                        <li class="{{   Route::is('farm-crop.index') || Route::is('farm-crop.create') ||  Route::is('farm-crop.edit') ? 'active' : '' }}"><a class="" href="{{route('farm-crop.index')}}"><i class="fa-regular fa-leaf"></i>Farm Crop</a></li>
                        <li class="{{   Route::is('farm_register.index') || Route::is('farm_register.create') ||  Route::is('farm_register.edit') ? 'active' : '' }}"><a class="" href="{{route('farm_register.index')}}"><i class="fa-regular fa-list-check"></i>Farm Activities</a></li>
                        <li class="{{   Route::is('farmUpload.index') || Route::is('farmUpload.create') ||  Route::is('farmUpload.edit') ? 'active' : '' }}"><a class="" href="{{route('farmUpload.index')}}"><i class="fa-regular fa-cloud-arrow-up"></i>Farm Upload</a></li>
                        <li class="{{   Route::is('note.index') || Route::is('note.create') ||  Route::is('note.edit') ? 'active' : '' }}"><a class="" href="{{route('note.index')}}"><i class="fa-regular fa-book"></i>Farm Notes</a></li>
                    </ul>
                </li>
    
                <li class="dropdown {{  Route::is('crop.index') || Route::is('crop.create')  || Route::is('crop.edit') ? 'active' : '' }}">
                    <a href="{{route('crop.index')}}" class="nav-link text-white dropdown-toggle" id="manageCropsToggle">
                        <i class="fa-regular fa-wheat-awn"></i>
                        Manage Crops
                    </a>
                    <ul class="d-none drop-menu" id="manageCropsDropdown">
                        <li class="{{   Route::is('crop.create') ? 'active' : '' }}"><a class="" href="{{route('crop.create')}}"><i class="fa-regular fa-plus"></i>Add Crops</a></li>
                        <li class="{{   Route::is('crop.create') ? 'active' : '' }}"><a class="" href="{{route('crop.index')}}"><i class="fa-regular fa-eye"></i>View Crops</a></li>
                    </ul>
                </li>
    
                <li class="dropdown {{  Route::is('category.index') || Route::is('category.create') || Route::is('category.edit') ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="farmActivitiesToggle">
                        <i class="fa-regular fa-tractor"></i>
                        Farm Categories
                    </a>
                    <ul class="d-none drop-menu" id="farmActivitiesDropdown">
                        <li class="{{   Route::is('category.create') ? 'active' : '' }}"><a class="" href="{{route('category.create')}}"><i class="fa-regular fa-plus"></i>Add Category</a></li>
                        <li class="{{   Route::is('category.index') ? 'active' : '' }}"><a class="" href="{{route('category.index')}}"><i class="fa-regular fa-eye"></i>View Category</a></li>
                    </ul>
                </li>

                <li class="dropdown {{  Route::is('category.index') || Route::is('category.create') || Route::is('category.edit') ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="farmActivitiesToggle">
                        <i class="fa-regular fa-shopping-cart"></i>
                      Airtime
                    </a>
                    
                </li>

                <li class="dropdown {{  Route::is('category.index') || Route::is('category.create') || Route::is('category.edit') ? 'active' : '' }}">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="farmActivitiesToggle">
                        <i class="fa-regular fa-exchange"></i>
                       Transactions
                    </a>
                    
                </li>


                @if (Auth::user()->role_id == 1)
                    <li class="dropdown {{  Route::is('staff.index') || Route::is('staff.create') || Route::is('staff.edit')  ? 'active' : '' }}">
                        <a href="{{route('staff.index')}}" class="nav-link text-white dropdown-toggle" id="managestaffToggle">
                            <i class="fa-regular fa-user"></i>
                            Manage Staff
                        </a>
                        <ul class="d-none drop-menu" id="managestaffDropdown">
                            <li class="{{   Route::is('staff.create') ? 'active' : '' }}"><a class="" href="{{route('staff.create')}}"><i class="fa-regular fa-plus"></i>Add Staff</a></li>
                            <li class="{{   Route::is('staff.index') ? 'active' : '' }}"><a class="" href="{{route('staff.index')}}"><i class="fa-regular fa-eye"></i>View Staff</a></li>
                        </ul>
                    </li>


                    <li class="dropdown {{  Route::is('settings.about_us') || Route::is('settings.edit_about_us') || Route::is('settings.team') ||  Route::is('settings.create_team') || Route::is('settings.edit_team_member') || Route::is('settings.testimonial') ||  Route::is('settings.create_testimonial') || Route::is('settings.edit_testimonial')  ? 'active' : '' }}">
                        <a href="" class="nav-link text-white dropdown-toggle" id="managestaffToggle">
                            <i class="fa-regular fa-user"></i>
                            Settings
                        </a>
                        <ul class="d-none drop-menu" id="managestaffDropdown">
                            <li class="{{   Route::is('settings.about_us') || Route::is('settings.edit_about_us') ? 'active' : '' }}"><a class="" href="{{route('settings.about_us')}}"><i class="fa-regular fa-plus"></i>About us</a></li>

                            <li class="{{   Route::is('settings.team') ||  Route::is('settings.create_team') || Route::is('settings.edit_team_member')? 'active' : '' }}"><a class="" href="{{route('settings.team')}}"><i class="fa-regular fa-plus"></i>Our Team</a></li>


                            <li class="{{   Route::is('settings.testimonial') ||  Route::is('settings.create_testimonial') || Route::is('settings.edit_testimonial')? 'active' : '' }}"><a class="" href="{{route('settings.testimonial')}}"><i class="fa-regular fa-plus"></i>Our Testimonial</a></li>



                            {{-- <li class="{{   Route::is('staff.index') ? 'active' : '' }}"><a class="" href="{{route('staff.index')}}"><i class="fa-regular fa-eye"></i>View Staff</a></li> --}}
                        </ul>
                    </li>


                @endif
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
                      <h5 class="m-0 d-none d-md-flex align-items-center">{{Auth::user()->name }}</h5>
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example1').DataTable();
            $('#example2').DataTable();
        });
    </script>
    {{-- @section('scripts') --}}
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const form = document.getElementById('staffForm');
        const password = document.getElementById('password');
        const passwordConfirmation = document.getElementById('password_confirmation');
        const submitButton = form.querySelector('button[type="submit"]');
    
        const validatePasswords = () => {
            if (password.value !== passwordConfirmation.value) {
                passwordConfirmation.setCustomValidity('Passwords do not match');
            } else {
                passwordConfirmation.setCustomValidity('');
            }
        };
    
        password.addEventListener('input', validatePasswords);
        passwordConfirmation.addEventListener('input', validatePasswords);
    
        form.addEventListener('submit', (event) => {
            validatePasswords();
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
    </script>
    
   
     <script src="{{asset('assets/resources/DataTable/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('assets/resources/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/script.js')}}"></script>
   
   
</body>
</html>