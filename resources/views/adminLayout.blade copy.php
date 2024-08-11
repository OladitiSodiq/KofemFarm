<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Farm</title>
 
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    

    <script src="{{asset('https://code.jquery.com/jquery-3.5.1.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('https://use.fontawesome.com/releases/v6.1.0/js/all.js')}}" crossorigin="anonymous"></script>
   

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">


    <link rel="stylesheet" href="{{asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('assets/ekko-lightbox/ekko-lightbox.css')}}">






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
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

    <script src="{{asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script src="{{asset('assets/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js') }}"></script>

<!-- Bootstrap -->
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('assets/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <!-- AdminLTE App -->





    <!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>



    
   

</body>
</html>
