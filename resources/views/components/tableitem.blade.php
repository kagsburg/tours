



@props(['item'])
 <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <!-- <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div> -->
                      <div>
                        <p class="font-semibold">{{$item->name}}</p>
                        <!-- <p class="text-xs text-gray-600 dark:text-gray-400">
                          Unemployed
                        </p> -->
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{$item->description}}
                  </td>
                  <!-- <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                    >
                      Pending
                    </span>
                  </td> -->
                  <td class="px-4 py-3 text-sm">
                    <!-- format date as MON 19th DEC 2021 -->
                    {{$item->created_at->format('M dS Y')}}
                    <!-- {{$item->created_at->format('d/m/Y')}} -->
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <a
                        href="/category/{{$item->id}}/edit"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                          ></path>
                        </svg>
                        </a>
                      <form action="/category/delete/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                        </form>
                      
                    </div>
                  </td>
                </tr>