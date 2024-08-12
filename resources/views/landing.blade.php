<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kofem Farm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/assets/Landing-page/img/KOFEM-FARM1.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" {{asset('assets/assets/Landing-page/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
   {{-- ')}} --}}
    <!-- Customized Bootstrap Stylesheet -->
    <link href=" {{asset('assets/assets/Landing-page/css/bootstrap.min.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/assets/Landing-page/lib/lightSlider/css/lightslider.css')}}">

    <!-- Template Stylesheet -->
    <link href=" {{asset('assets/assets/Landing-page/css/style.css')}}" rel="stylesheet">
</head>

<body>
   
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-light navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5 ">
        <a href="index.html" class="navbar-brand ms-lg-5 bg-light">
            <img src="{{asset('assets/assets/Landing-page/img/KOFEM-FARM1.png')}}" alt="Kofem"  style="height: 60px; width: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About Us</a>
                <a href="#service" class="nav-item nav-link">Our Services</a>
                <a href="#team" class="nav-item nav-link">Our Teams</a>
              
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <section class="container-fluid p-0" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('assets/assets/Landing-page/img/bg1.png')}}" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center p-5 col-md-8">
                            <h1 class="text-white display-1">Empowering Agriculture</h1>
                            <p class="fs-4 text-white mb-md-4">Discover innovative farming solutions and sustainable practices at Kofem Farm</p>
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('assets/assets/Landing-page/img/bg2.png')}}" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center p-5 col-md-8">
                            <h1 class="text-white display-1">Expanding Horizons</h1>
                            <p class="fs-4 text-white mb-md-4">From the fields to the airwaves, Kofem Farm is dedicated to growth and development.</p>
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('assets/assets/Landing-page/img/cassava.jpg')}}" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center p-5 col-md-8">
                            <h1 class="text-white display-1">Cassava Growth</h1>
                            <p class="fs-4 text-white mb-md-4">From cultivation to market, Kofem Farm is dedicated to nurturing cassava and ensuring top quality and fair prices.</p>
                            
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('assets/assets/Landing-page/img/corn.jpg')}}" alt="Image">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center p-5 col-md-8">
                            <h1 class="text-white display-1">Maize Growth</h1>
                            <p class="fs-4 text-white mb-md-4">From seed to harvest, Kofem Farm is committed to excellence in maize cultivation and delivering premium produce at competitive rates.</p>
                            
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5">Contact</a>
                        </div>
                    </div>
                </div>
               
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


   

        <!-- Banner Start -->
        <div class="container-fluid banner mb-5">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-md-6">
                        <div class="bg-primary bg-vegetable d-flex flex-column justify-content-center p-5" style="height: 300px;">
                            <h3 class="text-white mb-3">Fueling Progress</h3>
                            <p class="text-white">Reliable and efficient fueling stations for all your petrol and gas needs.</p>
                            <a class="text-white fw-bold" href="">Read More<i class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-secondary bg-fruit d-flex flex-column justify-content-center p-5" style="height: 300px;">
                            <h3 class="text-white mb-3">Bridging Communities</h3>
                            <p class="text-white">Engage with our media initiatives that connect and inform rural communities</p>
                            <a class="text-white fw-bold" href="">Read More<i class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Start -->
    
    
        <!-- About Start -->
        <section class="container-fluid about pt-5" id="about">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="d-flex h-100 border border-5 border-primary border-bottom-0 aboutP">
                            <img class="img-fluid mt-auto mx-auto" src="{{asset('assets/assets/Landing-page/img/'.$company->image.'')}}">
                        </div>
                    </div>
                    <div class="col-lg-6 pb-5">
                        <div class="mb-2">
                            <h6 class="text-primary text-uppercase visually-hidden">About Us</h6>
                            <h1 class="display-5 text-secondary">About US</h1>
                        </div>
                        <p class="mb-4"> {{$company->about_us }}</p>
                        <div class="row gx-5 gy-4 mt-2">
                            <div class="col-sm-6">
                                <i class="fa fa-hand-holding-heart display-1 text-secondary"></i>
                                <h4>Our Mission</h4>
                                <p class="mb-0">{{$company->our_mission}} </p>
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-chart-line display-1 text-secondary"></i>
                                <h4> Our Vision</h4>
                                <p class="mb-0">{{$company->our_vision}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->
    
    
        <!-- Facts Start -->
        <div class="container-fluid bg-primary facts py-5 mb-5">
            <div class="container py-5">
                <div class="row gx-5 gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-star fs-4 text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white">Our Experience</h5>
                                <h1 class="display-5 text-white mb-0"><span data-toggle="counter-up">15</span>+</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users fs-4 text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white">Our Farm</h5>
                                <h1 class="display-5 text-white mb-0"><span data-toggle="counter-up">20</span>+</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-check fs-4 text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white">Filling Station</h5>
                                <h1 class="display-5 text-white mb-0"><span data-toggle="counter-up">5</span>+</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-mug-hot fs-4 text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white">Happy Client</h5>
                                <h1 class="display-5 text-white mb-0"><span data-toggle="counter-up">1237</span>+</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
        
    
        <!-- Services Start -->
        <section class="container-fluid py-5" id="service">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <h6 class="text-primary text-uppercase">Services</h6>
                            <h1 class="display-5">KOFEM </h1>
                        </div>
                        <p class="mb-4">Providing sustainable agricultural solutions, impactful media services, and reliable fuel for your daily needs. Explore our diverse offerings to support your growth and development.</p>
                        <a href="#contact" class="btn btn-primary py-md-3 px-md-5">Contact Us</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light text-center p-5">
                            <i class="fa fa-seedling display-1 text-primary mb-3"></i>
                            <h4>Farming Solutions</h4>
                            <p class="mb-0">Innovative and sustainable farming practices to boost your agricultural productivity.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light text-center p-5">
                            <i class="fa fa-broadcast-tower display-1 text-primary mb-3"></i>
                            <h4>Media Services</h4>
                            <p class="mb-0">Connecting and informing communities through impactful media initiatives.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light text-center p-5">
                            <i class="fa fa-gas-pump display-1 text-primary mb-3"></i>
                            <h4>Fuel Station</h4>
                            <p class="mb-0">Reliable petrol and gas fueling stations to meet all your energy needs.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light text-center p-5">
                            <i class="fa fa-apple-alt display-1 text-primary mb-3"></i>
                            <h4>Farm Product Sales</h4>
                            <p class="mb-0">Supplying fresh and high-quality farm produce directly from our fields to your table.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light text-center p-5">
                            <i class="fa fa-leaf display-1 text-primary mb-3"></i>
                            <h4>Agro Consultancy</h4>
                            <p class="mb-0">Expert advice and consultancy services to guide you towards successful farming ventures.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services End -->
    
    
        <!-- Testimonial Start -->
        <div class="container-fluid bg-testimonial py-5 my-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="owl-carousel testimonial-carousel p-5">

                            @foreach($testimonials as $testimonial)
                            <div class="testimonial-item text-center text-white">
                                <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4"  src="{{asset('assets/assets/Landing-page/img/'.$testimonial->image.'')}}" alt="">
                                <p class="fs-5">{{$testimonial->feedback}}</p>
                                <hr class="mx-auto w-25">
                                <h4 class="text-white mb-0">{{$testimonial->name}}</h4>
                            </div>

                            @endforeach


                            {{-- <div class="testimonial-item text-center text-white">
                                <img class="img-fluid mx-auto p-2 border border-5 border-secondary rounded-circle mb-4" src="{{asset('assets/assets/Landing-page/img/05.jpg')}}" alt="">
                                <p class="fs-5">.</p>
                                <hr class="mx-auto w-25">
                                <h4 class="text-white mb-0">Adetunji Michael</h4>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    
    
        <!-- Team Start -->
        {{-- <section class="container-fluid py-5" id="team">
            <div class="container">
                <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase">The Team</h6>
                    <h1 class="display-5">We Are Professionals</h1>
                </div>
                <div class="row g-5" id="lightslider">

                    @foreach($teams as $team)
                    <div class="px-0">
                        <div class="row g-0">
                            <div class="col-10">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{asset('assets/assets/Landing-page/img/'.$team->image.'')}}" alt="">
                                    <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4" style="background: rgba(52, 173, 84, .85);">
                                        <h4 class="text-white">{{$team->name}}</h4>
                                        <span class="text-white">{{$team->designation}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                    <a class="btn btn-square rounded-circle bg-white" href="{{$team->twitter}}"><i class="fab fa-twitter text-secondary"></i></a>
                                    <a class="btn btn-square rounded-circle bg-white" href="{{$team->facebook}}"><i class="fab fa-facebook-f text-secondary"></i></a>
                                    <a class="btn btn-square rounded-circle bg-white" href="{{$team->linkedin}}"><i class="fab fa-linkedin-in text-secondary"></i></a>
                                    <a class="btn btn-square rounded-circle bg-white" href="{{$team->instagram}}"><i class="fab fa-instagram text-secondary"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section> --}}
        <!-- Team End -->
    
         <!-- Contact Start -->
         <section class="container-fluid py-5" id="contact">
            <div class="container">
                <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase">Contact Us</h6>
                    <h1 class="display-5">Please Feel Free To Contact Us</h1>
                </div>
                <div class="row g-0">
                    <div class="col-lg-7">
                        <div class="bg-primary h-100 p-5">
                            <form>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Your Name" style="height: 55px;">
                                    </div>
                                    <div class="col-6">
                                        <input type="email" class="form-control bg-light border-0 px-4" placeholder="Your Email" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control bg-light border-0 px-4" placeholder="Subject" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control bg-light border-0 px-4 py-3" rows="2" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-secondary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="bg-secondary h-100 p-5">
                            <h2 class="text-white mb-4">Get In Touch</h2>
                            <div class="d-flex mb-4">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-geo-alt fs-4 text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="text-white">Our Office</h5>
                                    <span class="text-white">123 Street, New York, USA</span>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-envelope-open fs-4 text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="text-white">Email Us</h5>
                                    <span class="text-white">info@example.com</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-phone-vibrate fs-4 text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="text-white">Call Us</h5>
                                    <span class="text-white">+012 345 6789</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact End -->
        
    
        <!-- Footer Start -->
        <div class="container-fluid bg-footer bg-primary text-white mt-5">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-8 col-md-6">
                        <div class="row gx-5">
                            <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                <h4 class="text-white mb-4">Get In Touch</h4>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-geo-alt text-white me-2"></i>
                                    <p class="text-white mb-0">123 Street, New York, USA</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-envelope-open text-white me-2"></i>
                                    <p class="text-white mb-0">info@example.com</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-telephone text-white me-2"></i>
                                    <p class="text-white mb-0">+012 345 67890</p>
                                </div>
                                <div class="d-flex mt-4">
                                    <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-secondary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                <h4 class="text-white mb-4">Quick Links</h4>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-white mb-2" href="#home"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                    <a class="text-white mb-2" href="#about"><i class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                                    <a class="text-white mb-2" href="#service"><i class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                                    <a class="text-white mb-2" href="#team"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a>
                                    <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-n5">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                            <h4 class="text-white">Newsletter</h4>
                            <h6 class="text-white">Subscribe Our Newsletter</h6>
                            <p>Amet justo diam dolor rebum lorem sit stet sea justo kasd</p>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">Kofem </a>. All Rights Reserved. Designed by <a class="text-primary fw-bold" href="https://oladitisodiq.github.io/">Atom's Hub Technologies </a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/assets/Landing-page/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/assets/Landing-page/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/assets/Landing-page/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/assets/Landing-page/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <script src="{{asset('assets/assets/Landing-page/lib/lightSlider/js/lightslider.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/assets/Landing-page/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#lightslider').lightSlider({
        adaptiveHeight:true,
        auto:true,
        loop:true,
        item:3,
        loop:false,
        slideMove:2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                    slideMove:1
                  }
            }
        ]
    });  
  });
      </script>
</body>

</html>