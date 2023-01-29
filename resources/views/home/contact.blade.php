<x-layout>


    
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Contact</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href=".">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
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
    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                <h1>Contact For Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}
                    </div>

                    @endif

                        <form action="{{route('contact.store')}}" method="POST" name="sentMessage" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" name="name" placeholder="Your Name"
                                        required="required" data-validation-required-message="Please enter your name" />
                                        <p></p>
                                        @error('name')
                                    <p class="help-block text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" name="email" placeholder="Your Email"
                                        required="required" data-validation-required-message="Please enter your email" />
                                        <p></p>
                                        @error('email')
                                    <p class="help-block text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" name="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                    <p></p>
                                    @error('subject')
                                    <p class="help-block text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" name="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                    <p></p>
                                    @error('message')
                                    <p class="help-block text-danger">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</x-layout>

