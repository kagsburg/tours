<x-layout_2>
    <div class="container grid px-6 mx-auto">
        <!-- section for user profile  -->
        <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            User Profile
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('profile.update', $user_info->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class="block mb-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Name</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $user_info->name }}" name="name" type="text" placeholder="Name">
                        @error('name')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
              
                         @enderror
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Email</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $user_info->email }}" name="email" type="text" placeholder="Email">
                        @error('email')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Your Bio</span>
                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="" 
                        rows="10"
                        name="bio" type="text" placeholder="Enter Description about yourself">
                        {{ $user_info->profile_description }}
                    </textarea>
                        @error('description')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Contact</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $user_info->contact }}" name="contact" type="text" placeholder="+1248773837483">
                       
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Address</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $user_info->address }}" name="location" type="text" placeholder="Enter Your Current Address">
                        
                </label>
                <label class="mt-4 ">
                    <span class="text-gray-700 dark:text-gray-400">*
                        Add Profile Image
                      </span>
                    <div class="mb-3 w-96">    
                        <img id="image_3" class="object-cover w-9 h-9 rounded-full" 
                        @if ($user_info->profile_img )
                        src="{{asset('images/'.$user_info->profile_img)}}"
                        @else
                        src= "{{asset('img/img_place.jpg')}}"
                        @endif
                        
                        alt="" aria-hidden="true">
                        <input type="file" name="profile_image" accept="image/*" onchange="document.getElementById('image_3').src = window.URL.createObjectURL(this.files[0])"
                        
                         class="form-input hidden" >         
                     
                    </div>
                    
        
                  </label>
                <a

                    href="{{ route('admin.categories.index') }}"
                    class="w-full mt-4 mr-4 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </a>
                <button
                    class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Save
                </button>

            </form>
        </div>
        <!-- section for user reset password  -->
        <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Reset Password
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('profile.updatepassword',$user_info->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="block mb-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">New Password </span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="" name="password" type="password" placeholder="*************">
                        @error('password')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Confirm Password</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="" name="password_confirmation" type="password" placeholder="*************">
                        @error('password_confirmation')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                <a

                    href="{{ route('admin.categories.index') }}"
                    class="w-full mt-4 mr-4 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </a>
                <button
                    class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Save
                </button>

            </form>
        </div>

    </div>

</x-layout_2>