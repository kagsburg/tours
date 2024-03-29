<x-layout>
     <!-- Header Start -->
     <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">About</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href=".">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
        <!-- Booking Start -->
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-5">
                <div class="bg-light shadow" style="padding: 30px;">
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf 
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                       <label><h3>Subscribe to our newsletter</h3></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                        <div class="date" >
                                            <input type="email" class="form-control p-4 " placeholder="Email Address" name="subscriber"/>
                                            @error('subscriber')
                                            <p class="help-block text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Subscribe</button>
                        </div>
                    </div>
                </form>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}
                </div>
                @endif
            </div>
        </div>
        <!-- Booking End -->
        <!-- About Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-6" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 " src="{{asset('images/'. $abouts->image1)}}" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-5 pb-lg-5">
                        <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Me</h6>
                            <h1 class="mb-3">{{ $abouts->title }}</h1>
                            <p>{{ $abouts->description}}</p>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <img class="img-fluid" src="{{asset('images/'. $abouts->image2)}}" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="{{asset('images/'. $abouts->image3) }}" alt="">
                                </div>
                            </div>
                            {{-- <a href="" class="btn btn-primary mt-1">Book Now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">My Blog</h6>
                <h1>Latest From My Blog</h1>
            </div>
            <div class="row pb-3">
                @unless(count($articles) ==0)
                @foreach($articles as $article)
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{asset('images/'.$article->cover_image)}}" alt="">
                            <div class="blog-date">
                                <h6 class="font-weight-bold mb-n1 text-white">{{$article->created_at->format('d') }}</h6>
                                <small class="text-white text-uppercase">{{$article->created_at->format('M')}}</small>
                            </div>
                        </div>
                        <div class="bg-white p-4">
                            <div class="d-flex mb-2">
                                {{-- <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a> --}}
                                {{-- <span class="text-primary px-2">|</span> --}}
                                <a class="text-primary text-uppercase text-decoration-none" href="{{route('blog.show',$article->id)}}">{{$article->title}}</a>
                            </div>
                            <a class="h5 m-0 text-decoration-none" href="{{route('blog.show',$article->id)}}">{{$article->description}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>No articles found</p>
                @endunless
                
            </div>
        </div>
    </div>
    <!-- Blog End -->
    

            <!-- Registration Start -->
    {{-- <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Mega Offer</h6>
                        <h1 class="text-white"><span class="text-primary">30% OFF</span> For Honeymoon</h1>
                    </div>
                    <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet ipsum</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum vero.</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Sign Up Now</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Select a destination</option>
                                        <option value="1">destination 1</option>
                                        <option value="2">destination 1</option>
                                        <option value="3">destination 1</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit">Sign Up Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Registration End -->




</x-layout>