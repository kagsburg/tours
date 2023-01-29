


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h2 class="text-primary"><span class="text-white text-uppercase">Regular</span>GUYUG</h2>
                </a>
                <p>{{ session('abouts.0.description') }}</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Me</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="{{ session('socials.0.twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="{{ session('socials.0.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="{{  session('socials.0.youtube') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="{{ session('socials.0.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Useful Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="{{route('about')}}" target="_blank"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="{{route('blog')}}" target="_blank"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    @if (Auth::check())
                    <a class="text-white-50 mb-2" href="{{route('admin.categories.index')}}" target="_blank"><i class="fa fa-angle-right mr-2"></i>Dashboard</a>
                    @else
                     <a class="text-white-50 mb-2" href="{{route('login')}}" target="_blank"><i class="fa fa-angle-right mr-2"></i>admin</a>
                    @endif
                    <a class="text-white-50 mb-2" href="{{route('contact')}}" target="_blank"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    {{-- <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a> --}}
                    {{-- <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                {{-- <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;"></h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="./about"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="./blog"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    {{-- <a class="text-white-50 mb-2" href="./events"><i class="fa fa-angle-right mr-2"></i>Events</a> 
                    <a class="text-white-50 mb-2" href="./contact"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    {{-- <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    {{-- <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a> 
                </div> --}}
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Me</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>{{session('author.address')}}</p>
                <p><i class="fa fa-phone-alt mr-2"></i>{{session('author.contact')}}</p>
                <p><i class="fa fa-envelope mr-2"></i>{{ session('author.email') }}</p>
                <!-- <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3">Sign Up</button>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                {{-- <p class="m-0 text-white-50">Designed by <a href="https://htmlcodex.com">HTML Codex</a>
                </p> --}}
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
