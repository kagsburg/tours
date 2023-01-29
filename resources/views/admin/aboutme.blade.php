<x-layout_2>
    <div class="container grid px-6 mx-auto">
        <!-- section for admin User About Me -->
        <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            About Me 
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form 
            action="{{ route('admin.abouts.update', $about->id)}}" 
            enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('PUT')
                <label class="block mb-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Title</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $about->title}}" 
                        name="title" type="text" placeholder="Title about yourself">
                        @error('title')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
              
                         @enderror
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Description</span>
                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="" 
                        rows="10"
                        name="description" type="text" placeholder="Enter Description about yourself">
                        {{ $about->description }}
                    </textarea>
                        @error('description')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                <label class="inline-block ">
                    <span class="text-gray-700 dark:text-gray-400">Background Image</span>
                    
                    <img id="back_image" class="object-cover w-9 h-9 rounded-full"
                    @if ( $about->image1 == '' )
                     src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=aa3a807e1bbdfd4364d1f449eaa96d82" 
                     alt="" aria-hidden="true"
                     @else
                       src="{{asset('images/'.$about->image1)}}"  
                       @endif                     
                     >
                    <input type="file" name="background_image" accept="image/*" onchange="document.getElementById('back_image').src = window.URL.createObjectURL(this.files[0])"
                    
                     class="form-input hidden" >
                </label>
                <label class="inline-block ml-4">
                    <span class="text-gray-700 dark:text-gray-400"> Image 1</span>
                    <img id="image_1" class="object-cover w-9 h-9 rounded-full" 
                    @if ( $about->image2 == '' )                    
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=aa3a807e1bbdfd4364d1f449eaa96d82" 
                    @else
                    src="{{asset('images/'.$about->image2)}}"  
                    @endif
                    alt="" aria-hidden="true">
                    <input type="file" name="image1" accept="image/*" onchange="document.getElementById('image_1').src = window.URL.createObjectURL(this.files[0])"
                    
                     class="form-input hidden" >
                </label>
                <label class="inline-block ml-4">
                    <span class="text-gray-700 dark:text-gray-400">Image  2</span>
                    <img id="image_2" class="object-cover w-9 h-9 rounded-full" 
                    @if ( $about->image3 == '' ) 
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=aa3a807e1bbdfd4364d1f449eaa96d82" 
                    @else
                    src="{{asset('images/'.$about->image3)}}"  
                    @endif
                    
                    alt="" aria-hidden="true">
                    <input type="file" name="image2" accept="image/*" onchange="document.getElementById('image_2').src = window.URL.createObjectURL(this.files[0])"
                    
                     class="form-input hidden" >
                </label>
                <div class="flex">
                <a

                    href="{{ route('admin.categories.index') }}"
                    class="w-full mt-4  mr-4 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </a>
                <button
                type="submit"
                    class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Update
                </button>
                </div>
            </form>
        </div>
    </h4>

    </div>
</x-layout_2>
