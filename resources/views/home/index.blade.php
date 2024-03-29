<x-layout>
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                    <div class="carousel-item 
                    @if ($loop->first)
                    active
                    @endif
                    ">
                        <img class="w-100" src="{{asset('images/'.$banner->image)}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase mb-md-3">{{ $banner->title }}</h4>
                                <h1 class="display-3 text-white mb-md-4">{{ $banner->description }}</h1>
                                <a href="{{route('about')}}" class="btn btn-primary py-md-3 px-md-5 mt-2">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- Carousel End -->
        
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
                        <img class="position-absolute w-100 " src="{{asset('images/'.$abouts->image1)}}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Me</h6>
                        <h1 class="mb-3">{{ $abouts->title }}</h1>
                        <p>{{$abouts->description}}</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="{{asset('images/'.$abouts->image2)}}" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="{{asset('images/'.$abouts->image3)}}" alt="">
                            </div>
                        </div>
                        {{-- <a href="" class="btn btn-primary mt-1">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
            <!-- Blog Start -->
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row pb-3">
                            @unless(count($articles) ==0)
                                @foreach($articles as $article)
                                <div class="col-md-6 mb-4 pb-2">
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
                                <!-- <div class="col-md-6 mb-4 pb-2">
                                    <div class="blog-item">
                                        <div class="position-relative">
                                            <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                                            <div class="blog-date">
                                                <h6 class="font-weight-bold mb-n1">01</h6>
                                                <small class="text-white text-uppercase">Jan</small>
                                            </div>
                                        </div>
                                        <div class="bg-white p-4">
                                            <div class="d-flex mb-2">
                                                <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                                                <span class="text-primary px-2">|</span>
                                                <a class="text-primary text-uppercase text-decoration-none" href="">Tours & Travel</a>
                                            </div>
                                            <a class="h5 m-0 text-decoration-none" href="">Dolor justo sea kasd lorem clita justo diam amet</a>
                                        </div>
                                    </div>
                                </div> -->
                               
                                
                            </div>
                        </div>
            
                        <div class="col-lg-4 mt-5 mt-lg-0">
                            <!-- Author Bio -->
                            <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                                <img 
                                @if(session('author.profile_img') == null)
                                src="{{asset('img/img_place.jpg')}}"
                                @else
                                src="{{asset('images/'.session('author.profile_img')) }}" 
                                @endif
                                
                                class="img-fluid mx-auto mb-3" style="width: 100px;">
                                <h3 class="text-primary mb-3">{{session('author.name')}}</h3>
                                <p>{{ session('author.profile_description') }}</p>
                                <div class="d-flex justify-content-center">
                                    <a class="text-primary px-2"href="{{ session('socials.0.facebook') }}"  target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="text-primary px-2" href="{{ session('socials.0.twitter') }}"  target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    {{-- <a class="text-primary px-2" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a> --}}
                                    <a class="text-primary px-2" href="{{ session('socials.0.instagram') }}"  target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a class="text-primary px-2"href="{{  session('socials.0.youtube') }}"  target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>                    
            
                            <!-- Recent Post -->
                            <div class="mb-5">
                                <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
                                @unless ($recent->isEmpty())
                                        @foreach ($recent as $item)
                                            <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="{{ route('blog.show', $item->id) }}">
                                                <img class="img-fluid" src="{{ asset('images/'.$item->cover_image) }}" width="170px" height="100px" alt="">
                                                <div class="pl-3">
                                                    <h6 class="m-1">{{ $item->title }}</h6>
                                                    <small>{{ $item->created_at->format('M d, Y') }}</small>
                                                </div>
                                            </a>
                                        @endforeach
                                @else
                                        <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="">
                                            <img class="img-fluid" src="img/blog-100x100.jpg" alt="">
                                            <div class="pl-3">
                                                <h6 class="m-1">No Recent Post</h6>
                                                <small>Jan 01, 2050</small>
                                            </div>
                                        </a>
                                 @endunless
                            </div>
                                                <!-- Category List -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0">
                            @unless ($categories->isEmpty())
                                    @foreach ($categories as $category)
                                    <li class="mb-3 d-flex justify-content-between align-items-center">
                                        <a class="text-dark" href="{{ route('category.show', $category->id) }}"><i class="fa fa-angle-right text-primary mr-2"></i>{{ $category->name }}</a>
                                        <span class="badge badge-primary badge-pill">{{ $category->articles()->count() }}</span>
                                    </li>
                                    @endforeach
                                    @else
                                        <li class="mb-3 d-flex justify-content-between align-items-center">
                                            <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>No
                                                Category</a>
                                            <span class="badge badge-primary badge-pill">0</span>
                                        </li>   
                                @endunless       
                               
                                
                            </ul>
                        </div>
                    </div>
            
                            <!-- Tag Cloud -->
                            <!-- <div class="mb-5">
                                <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h4>
                                <div class="d-flex flex-wrap m-n1">
                                    <a href="" class="btn btn-light m-1">Tours</a>
                                    <a href="" class="btn btn-light m-1">Lifestyle</a>
                                    <a href="" class="btn btn-light m-1">Marketing</a>
                                    <a href="" class="btn btn-light m-1">SEO</a>
                                    <a href="" class="btn btn-light m-1">Writing</a>
                                    <a href="" class="btn btn-light m-1">Consulting</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog End -->

</x-layout>