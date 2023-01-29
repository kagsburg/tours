<x-layout>
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Blog Detail</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Blog Detail</p>
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

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset('images/'.$article->cover_image)}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold text-white mb-n1">{{$article->created_at->format('d') }}</h6>
                                    <small class="text-white text-uppercase">{{$article->created_at->format('M')}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none"  href="{{route('blog.show',$article->id)}}">{{$article->title}}</a>
                            </div>
                            <h2 class="mb-3">{{$article->description}}</h2>

                            {!! $article->content !!}
                           
                            
                        </div>
                    </div>
                    <!-- Blog Detail End -->
{{--     
                    <!-- Comment List Start -->
                    <div class="bg-white" style="padding: 30px; margin-bottom: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">3 Comments</h4>
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                    Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                    consetetur at sit.</p>
                                <button class="btn btn-sm btn-outline-primary">Reply</button>
                            </div>
                        </div>
                        <div class="media">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                    Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                    consetetur at sit.</p>
                                <button class="btn btn-sm btn-outline-primary">Reply</button>
                                <div class="media mt-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                        style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                            labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                            eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet
                                            ipsum diam tempor consetetur at sit.</p>
                                        <button class="btn btn-sm btn-outline-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Leave a comment</h4>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>
    
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave a comment"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End --> --}}
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
    
                    {{-- <!-- Search Form -->
                    <div class="mb-5">
                        <div class="bg-white" style="padding: 30px;">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}

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
    
                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Posts</h4>
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
    
                    <!-- Tag Cloud -->
                    {{-- <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h4>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


</x-layout>