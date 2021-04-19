<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    @if ($undanganId != null)

        <div class="container px-5 w-full ">

            <div class="md:max-w-32 bg-white flex flex-col md:ml-auto  md:py-8  md:mt-0">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Show undangan</h2>


                <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-32">
                            <label for="name" class="min-w-32 leading-7 text-sm font-bold text-gray-900">Judul</label>
                        </div>
                        <div class="w-1/2">
                            <label for="name" class="leading-7 text-sm text-gray-600">{{ $undangan->judul }}</label>
                        </div>
                    </div>

                </div>

                <div class="relative mb-4">

                    <div class="flex flex-row w-full">
                        <div class="w-32">
                            <label for="name" class="leading-7 font-bold text-sm text-gray-900">Lokasi</label>
                        </div>
                        <div class="w-1/2">
                            <label for="name" class="leading-7 text-sm text-gray-600">{{ $undangan->lokasi }}</label>
                        </div>
                    </div>

                </div>


                <div class="relative mb-4">

                    <div class="flex flex-row w-full">
                        <div class="w-32">
                            <label for="name" class="leading-7 font-bold text-sm text-gray-900">Tanggal Mulai</label>
                        </div>
                        <div class="w-1/2">
                            <label for="name"
                                class="leading-7 text-sm text-gray-600">{{ $undangan->tanggal_mulai }}</label>
                        </div>
                    </div>
                </div>

                <div class="relative mb-4">

                    <div class="flex flex-row w-full">
                        <div class="w-32">
                            <label for="name" class="leading-7 font-bold text-sm text-gray-900">Tanggal Akhir</label>
                        </div>
                        <div class="w-1/2">
                            <label for="name"
                                class="leading-7 text-sm text-gray-600">{{ $undangan->tanggal_akhir }}</label>
                        </div>
                    </div>
                </div>

                <div class="relative mb-4">

                    <div class="flex flex-row w-full">
                        <div class="w-32">
                            <label for="name" class="leading-7 font-bold text-sm text-gray-900">Jenis</label>
                        </div>
                        <div class="w-1/2">
                            <label for="name" class="leading-7 text-sm text-gray-600">{{ $undangan->jenis }}</label>
                        </div>
                    </div>

                </div>
                <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-32">
                            <label for="keterangan" class="leading-7 text-md font-bold text-gray-900">Keterangan</label>  
                    </div>
                    <div>
                            <label for="keterangan" class="leading-7 text-sm text-gray-600">{{ $undangan->keterangan }}</label>
                    </div>
                </div>



            </div>
            <button wire:click="$emitTo('undangan.add-pegawai', 'onShowPegawaiListener','{{ $undanganId }}')" type='button' class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
            px-6 mt-5 mb-5 focus:outline-none hover:bg-blue-600 rounded {{ $undanganId==null ? 'invisible':'' }}">Tambah Pegawai</button></a>
 
            @livewire('undangan.undangan-pegawai',['id'=>$undanganId]) {{-- render komponen dalm komponen dengn parameter- lihat parameter dalam function mount --}}
            @livewire('undangan.add-pegawai')

        </div>
        
    @endif
    
    {{-- memunculkan tabel undangan pegawai --}}
    <button type="button" @click="isBrowseData = true,isPreviewData=false"
        class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Cancel</button>

</div>