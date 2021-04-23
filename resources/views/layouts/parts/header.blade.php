<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <a><img src="/aset/logotii.png"></a>
        <span class="ml-3 text-xl">Sistem Informasi Pegawai</span>
      </a>
      <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      @if(Auth::check())
        @if(Auth::user()->role->name=='admin')
        {{-- <a class="mr-5 hover:text-gray-900">Dashboard</a> --}}
        <a href="{{ route('pegawai.index') }}" class="mr-5 hover:text-gray-900">Pegawai</a>
        <a href="{{ route('bagian.browse') }}" class="mr-5 hover:text-gray-900">Bagian</a>
        <a href="{{ route('undangan.browse') }}" class="mr-5 hover:text-gray-900">Undangan</a>
        <a href="{{ route('role.browse') }}" class="mr-5 hover:text-gray-900">Role</a>
        {{-- <a href="{{ route('undangan_pegawai.index') }}" class="mr-5 hover:text-gray-900">Undangan Pegawai</a>
        <a href="{{ route('undangan_bagian.index') }}" class="mr-5 hover:text-gray-900">Undangan Bagian</a> --}}
        {{-- <a class="mr-5 hover:text-gray-900">Contact</a> --}}
        @endif
      @endif
      </nav>
      @if(Auth::check())

      {{-- Penggunaan dengan alphine js --}}
      <div class="relative" x-data="{ isOpen: false}">
        <button 
                @click="isOpen = !isOpen" 
                @keydown.escape="isOpen = false" 
                class="flex items-center" 
        >
        @if(Auth::user()->photo!=null)
        <img src="{{ url(Auth::user()->photo) }}" class="w-8 h-8 rounded-full">
        @else 
        <img src="" class="w-8 h-8 rounded-full">
        @endif
          
            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path></svg>
        </button>
        <ul x-show="isOpen"
            @click.away="isOpen = false"
            class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20"
        >
            

            <li>
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                  <img class="h-10 w-10 rounded-full" src="{{ url(Auth::user()->photo)}}" alt="">
                </div>
                <div class="ml-3">
                  <div class="text-sm font-medium text-gray-900">
                    {{ Auth::user()->name}}
                  </div>
                  <div class="text-sm text-gray-500">
                    {{ Auth::user()->role->description}}
                  </div>

                  <div class="text-sm text-gray-500">
                    {{ Auth::user()->pegawai->name}}
                  </div>
                </div>
              </div>
            </li>

            <li>
              <a href="{{ route('profile.edit') }}" class="flex items-center px-3 py-3 hover:bg-gray-200">
                  <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-gray-600"><path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" class="heroicon-ui"></path></svg>
                  <span class="ml-2">Profile</span>
              </a>
          </li>

          @if(Auth::user()->role->name=='admin')
            <li class="border-b border-gray-400">
                <a href="{{ route('user.index') }}" class="flex items-center px-3 py-3 hover:bg-gray-200">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-gray-600"><path d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" class="heroicon-ui"></path></svg>
                    <span class="ml-2">User</span>
                    
                </a>
            </li>
          @endif
            
            <li>
                <button onclick="event.preventDefault(); document.getElementById('form_logout').submit();" class="flex items-center px-3 py-3 hover:bg-gray-200">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-600"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
                    </svg><span class="ml-2">Logout</span>
                </button>
            </li>
        </ul>
    </div>

      {{-- <button onclick="event.preventDefault(); document.getElementById('form_logout').submit();"
       class="cursor-pointer inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Logout
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
      </button> --}}
      @else
      <a href="{{url('/login')}} "class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Login
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
      </a>
      @endif
      <form action="{{ route('logout') }}" method="post" id="form_logout">
        @csrf
      </form>
    </div>
</header>