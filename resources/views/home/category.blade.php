<x-layout>

 <!-- Header Start -->
 <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">About</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{route('home')}}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

     <!-- Blog Start -->
     <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">My Blog</h6>
                <h1>Latest From {{ $category->name }}</h1>
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
</x-layout>