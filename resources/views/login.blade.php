{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Manager Login Page</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>
<body> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/img/kofem_logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('assets/resources/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets/css/responsive.css')}}">
    <title>KOFEM - Farm Manager</title>
</head>

<body>

<body>
    <section id="hero">
        <div class="wrapper">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-10 ">
                        <div class="card py-5 px-md-3">
                            <div class="card-body">
                                <div class="login-logo d-flex justify-content-center mb-3">
                                    <img src="{{asset('assets/resources/img/KOFEM-COLOR.png')}}" alt="kofem_logo">
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-7 col-md-12">
                                        <div class="p-3">
                                            <h2>Sign In!</h1>
                                            <p>Login to stay connected</p>
                                            <form method="POST" action="{{ route('farm.login') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating form-group mb-3">
                                                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Email address</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-floating form-group mb-3">
                                                            <input type="password" class="form-control" name="password" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Password</label>
                                                            </div>
                                                    </div>
                                                </div>
    
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-success w-100">Login</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none d-lg-block img-fit">
                                        <img src="{{asset('assets/resources/img/agricultural-data-collection-using-smart-nutrition-device.svg')}}" alt="login" class="img-fluid h-100 w-100">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="{{asset('assets/resources/bootstrap/js/bootstrap.bundle.min.jszas')}}"></script>
    <script src="{{asset('assets/assets/js/script.js')}}"></script>
</body>
</html>



{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Farm Manager Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('farm.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link to Bootstrap JavaScript (optional, for some interactive features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html> --}}
