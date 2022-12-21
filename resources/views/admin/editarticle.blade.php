<x-layout_2>

    <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Update Article  {{ $article->title }}
      </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('updatearticle', $article->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block mb-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">*Article Title Name</span>
          <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
          name="title"
          value="{{$article->title}}"
          placeholder="Title">
          @error('title')
          <p class="text-red-700 text-xs mt-1">{{$message}}</p>
              
          @enderror
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">*Article Description</span>
            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
            name="description"
            value="{{$article->description}}"
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
                <img src="{{asset('images/'.$article->cover_image)}}" alt="" width="200px" class="w-96">
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
          
            @foreach ($categories as $category)
            <!-- get selected category -->
            @if ($category->id == $article->category_id)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
              @endforeach
          </select>
          @error('category_id')
            <p class="text-red-700 text-xs mt-1">{{$message}}</p>                
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Article Content</span>
          <!-- <div id="textarea">
          {{old('content')}}
          </div> -->
          <textarea id="editor" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
          rows="10" name="content" placeholder="Enter Article content.">
          {{$article->content}}
         </textarea>
        </label>
        <div class="flex justify-between mt-6">
            <div>
            <a
            href="{{ route('articles') }}"
            class="w-full mt-4 mr-4 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Cancel
            </a> 
            </div>
       <div>
          <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">Update Article</button>
       </div>
        </div>
    </form>
      </div>

</x-layout_2>