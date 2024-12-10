@extends('../layout.layout')
@section('title', 'Search')
@section('links')
@vite(['resources/css/app.css', 'resources/js/app.js',"resources/js/components/scroll.js" ,"resources/css/components/search.css"])
@endsection
@section('content')
    <x-navbar/>
    <h1 class="text-3xl font-bold text-center">Welcome to Book Page</h1>
    <section class="py-3 bg-light ">
        <form class="max-w-md mx-auto">
            <div class="relative mb-4 flex  ">
              <!-- Icon -->
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
              </div>
              <!-- Search Input -->
              <input
                type="search"
                id="default-search"
                class="block w-full py-4 px-4.15 pl-10 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search Mockups, Logos..."
                required
              />
              <!-- Submit Button -->
              <button
                type="submit"
                class="text-white  bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2"
              >
                Search
              </button>
            </div>
          </form>

    </section>
  <section class="container justify-content-center mx-auto px-4">
      <div class="books grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 justify-items-center">
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 1</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 2</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 3</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 4</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 5</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 6</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 7</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 8</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Profile Picture" class="mb-4">
              <h2 class="text-lg font-bold mb-2">Card 9</h2>
              <p class="text-gray-700 text-base">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
          </div>
      </div>
  </section>
  <section class="container mx-auto px-4">
    <div class="grid grid-cols-3 gap-4">
        </div>
    <div class="flex justify-center mt-4">
        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Previous</button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Next</button>
    </div>
  </section>
    <x-footer/>
@endsection