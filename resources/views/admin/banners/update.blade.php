<x-layout_2>
    <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Edit Banner Content
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('updatebanner',$banner->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block mb-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">*Banner Title Name</span>
          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
          name="title"
          value="{{$banner->title}}"
          placeholder="Title">
          @error('title')
          <p class="text-red-700 text-xs mt-1">{{$message}}</p>
              
          @enderror
        </label>
        <label class="block ">
            <span class="text-gray-700 dark:text-gray-400">*Banner Description</span>
            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
            name="description"
            value="{{$banner->description}}"
            placeholder="Description">
            @error('description')
            <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                
            @enderror
          </label>
          <label class="mt-4 ">
            <span class="text-gray-700 dark:text-gray-400">*
               Update Banner Image
              </span>
            <div class="mb-3 w-96">    
                <img id="image_1" class="object-cover w-9 h-9 rounded-full" 
                src= "{{asset('images/'.$banner->image)}}"
                
                alt="" aria-hidden="true">
                <input type="file" name="image" accept="image/*" onchange="document.getElementById('image_1').src = window.URL.createObjectURL(this.files[0])"
                
                 class="form-input hidden" >         
             
            </div>
            @error('image')
            <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                
            @enderror

          </label>


        <div class="flex justify-start mt-6">
          <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">Update Banner</button>
        </div>
    </form>
      </div>

</x-layout_2>