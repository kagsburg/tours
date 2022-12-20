<x-layout_2>


    <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Add New Article
      </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('storearticle')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="block mb-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">*Article Title Name</span>
          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
          name="title"
          value="{{old('title')}}"
          placeholder="Title">
          @error('title')
          <p class="text-red-700 text-xs mt-1">{{$message}}</p>
              
          @enderror
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">*Article Description</span>
            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
            name="description"
            value="{{old('description')}}"
            placeholder="Description">
            @error('description')
            <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                
            @enderror
          </label>
          <div class="mt-4 ">
            <span class="text-gray-700 dark:text-gray-400">*
                Add Article Cover Image
              </span>
            <div class="mb-3 w-96">             
              <input 
                name="cover_image"
              class="form-control
              block
              w-full
              px-2
              py-1
              text-sm
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm" type="file">
            </div>
            @error('cover_image')
            <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                
            @enderror

          </div>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Select Article Category
          </span>
          <select name="category_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
           <option>Select Category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
          </select>
          @error('category_id')
            <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Article Content</span>
          <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
          rows="10" name="content" placeholder="Enter Article content.">{{old('content')}}</textarea>
        </label>

        <div class="flex justify-end mt-6">
          <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">Add Article</button>
        </div>
    </form>
      </div>

</x-layout_2>