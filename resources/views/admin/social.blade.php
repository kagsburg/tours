<x-layout_2>

    <div class="container grid px-6 mx-auto">
         <!-- section for admin User Socials -->
         <h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                User Socials
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form 
            action="{{ route('admin.socials.update', $socials->id)}}" 
                method="POST">
                @csrf
                @method('PUT')
                <label class="block mb-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Facebook</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $socials->facebook }}" 
                        name="facebook" type="text" placeholder="Facebook link">
                        @error('facebook')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
              
                         @enderror
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Twitter</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $socials->twitter }}" 
                        name="twitter" type="text" placeholder="Twitter Profile Link">
                        @error('twitter')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Instagram</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $socials->instagram }}" 
                        name="instagram" type="text" placeholder="Instagram Profile Link">
                        @error('instagram')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Youtube</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $socials->youtube }}" 
                        name="youtube" type="text" placeholder="Youtube">
                        @error('youtube')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label>
                {{-- <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Linkedin</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $socials->linkedin }}" 
                        name="linkedin" type="text" placeholder="Linkedin">
                        @error('linkedin')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label> --}}
                {{-- <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Github</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $user_info->github }}" name="github" type="text" placeholder="Github">
                        @error('github')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label> --}}
                {{-- <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Website</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $socials->website }}" name="website" type="text" placeholder="Website">
                        @error('website')
                        <p class="text-red-700 text-xs mt-1">{{$message}}</p>
                            @enderror
                </label> --}}
                <a

                    href="{{ route('admin.categories.index') }}"
                    class="w-full mt-4 mr-4 px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </a>
                <button
                type="submit"
                    class="w-full mt-4 px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Update
                </button>
                
            </form>
        </div>


    </div>




</x-layout_2>