<x-layout_2>

<h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
             Update {{ $category->name }}
            </h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="/categories/update/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')
              <label class="block mb-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400"> Category Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                value="{{ $category->name }}" name="name" type="text"	placeholder="Category Name">
               
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400"> Category Description</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                value="{{ $category->description }}" name="description" type="text"	placeholder="Category Name">               
              </label>
              <a
            
            href="/admin/categories"
            class="w-full mt-4 mr-4 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Cancel
            </a>
          <button
            class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          >
            Save
          </button>
              
            </form>
            </div>



</x-layout_2>