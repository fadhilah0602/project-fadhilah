<div>
    {{-- Be like water. --}}

    @if(Auth::check())
    @switch(Auth::user()->role->name)
        @case('admin')
            @include('layouts.parts.hero')
            @break
        @case('admin_bagian')
            @livewire('admin-bagian-dashboard')
            @break
        @case('pegawai')
            @livewire('pegawai-dashboard')
            @break
        @default
            
    @endswitch

    @else
    @include('layouts.parts.hero')
    @endif
    
</div>
