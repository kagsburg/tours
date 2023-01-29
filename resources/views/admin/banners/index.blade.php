<x-layout_2>
    <div class=" container grid px-6 mx-auto1">
        <h2
          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Banners 
        </h2>
        <div class="flex flex-col flex-wrap mb-8 space-y-4 md:flex-row md:items-end md:space-x-4">
            <!-- Divs are used just to display the examples. Use only the button. -->
            <div>
              <a 
              href="{{ route('addbanner') }}" 
              class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <span>Add New Banner </span>
                <span class="ml-2" aria-hidden="true">+</span>
                {{-- <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                  <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg> --}}
              </a>
            </div>
          </div>
                  <!-- With actions -->
        <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
      >
        Table with actions
      </h4>
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Banner Title</th>
                <th class="px-4 py-3">Banner Description</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Actions</th>
              </tr>
            </thead>
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
            @unless (count($banner) == 0)
            @foreach ($banner as $article)
              <x-banner-row :banner="$article" />
            @endforeach
            @else
            <tr>
              <td colspan="5" class="text-center">No Banner Found</td>
            </tr>
            @endunless
          


            </tbody>
          </table>
        </div>
        <div
          class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
        >
          <span class="flex items-center col-span-3">
            Showing {{ $banner->firstItem() }} to {{ $banner->lastItem() }} of {{ $banner->total() }} Results
          </span>
          <span class="col-span-2"></span>
          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
              <ul class="inline-flex items-center">
                {{$banner->links()}}
              </ul>
            </nav>
          </span>
        </div>
      </div>

    </div>
</x-layout_2>