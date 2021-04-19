<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="container px-5  ">
        <form enctype="multipart/form-data">
            @csrf
            <div class="lg:w-1/2 w-full">


                <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">

                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Input Data Undangan</h2>

                    <input type="hidden" wire:model.defer="undanganId">

                    <div class="relative mb-4">
                        <label for="judul" class="leading-7 text-sm text-gray-600">Judul</label>
                        <input type="text" wire:model.defer="judul"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('judul')
                            <p class="text-red-600">{{ $errors->first('judul') }}</p>
                        @enderror
                        {{-- message --}}
                    </div>
                    <div class="relative mb-4">
                        <label for="lokasi" class="leading-7 text-sm text-gray-600">Lokasi</label>
                        <input type="text" wire:model.defer="lokasi"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="tanggal_mulai" class="leading-7 text-sm text-gray-600">Tanggal Mulai</label>
                        <input type="date" wire:model.defer="tanggalMulai"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('tanggalMulai')
                            <p class="text-red-600">{{ $errors->first('tanggalMulai') }}</p>
                        @enderror
                        {{-- message --}}
                    </div>
                    <div class="relative mb-4">
                        <label for="tanggal_akhir" class="leading-7 text-sm text-gray-600">Tanggal Akhir</label>
                        <input type="date" wire:model.defer="tanggalAkhir"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('tanggalAkhir')
                            <p class="text-red-600">{{ $errors->first('tanggalAkhir') }}</p>
                        @enderror
                        {{-- message --}}
                    </div>
                    <div class="relative mb-4">
                        <label for="jenis" class="leading-7 text-sm text-gray-600">Jenis</label>

                        @if (\App\UndanganBagian::where('undangan_id', $undanganId)->count() + \App\UndanganPegawai::where('undangan_id', $undanganId)->count() > 0)
                            <select wire:model.defer="jenis" disabled
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value=""></option>
                                <option value="pegawai" {!! $jenis == 'pegawai' ? 'selected' : '' !!}>Pegawai </option>
                                <option value="bagian" {!! $jenis == 'bagian' ? 'selected' : '' !!}>Bagian</option>

                            </select>
                        @else
                            <select wire:model.defer="jenis"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value=""></option>
                                <option value="pegawai" {!! $jenis == 'pegawai' ? 'selected' : '' !!}>Pegawai </option>
                                <option value="bagian" {!! $jenis == 'bagian' ? 'selected' : '' !!}>Bagian</option>

                            </select>
                        @endif
                        @error('jenis')
                            <p class="text-red-600">{{ $errors->first('jenis') }}</p>
                        @enderror
                        {{-- message --}}
                    </div>
                    <div class="relative mb-4">
                        <label for="keterangan" class="leading-7 text-sm text-gray-600">Keterangan</label>
                        <textarea wire:model.defer="keterangan"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('keterangan') }}</textarea>
                    </div>

                    {{-- <div class="relative mb-4">
                        <label for="file_undangan" class="leading-7 text-sm text-gray-600">File Undangan</label>
                        <input type="file" wire:model.defer="fileUndangan" accept="application/pdf,application/vnd.ms-excel" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
                    </div> --}}
                    <div x-data="{ isUploading: false, progress: 40 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <div>
                            <input type="file" wire:model.defer="fileUndangan"
                                accept="application/pdf,application/vnd.ms-excel"
                                class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <div x-show="isUploading"
                                class="absolute mt-6 inset-y-0 right-0 flex items-center mr-3 pr-2 pointer-events-none">
                                <svg class="animate-spin -mr-1 ml-3 h-5 w-5 text-purple-400"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </div>


                        <div x-show="isUploading">
                            <progress class="w-full px-2" max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>


                </div>
            </div>
            {{-- <div>
                <button  wire:click="$emitTo('undangan.add-pegawai', 'onShowPegawaiListener','{{ $undanganId }}')"  type="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                      px-6 focus:outline-none hover:bg-blue-600 rounded">Tambah Pegawai</button>
            </div> --}}


            {{-- {{ \App\Undangan::where('id',$undanganId)->first()->undanga_bagians()->count() }} --}}

            <div class="{{ $jenis == 'pegawai' || $jenis == null ? 'hidden' : '' }}">
                {{-- tambah tabel add-undangan pada tabel undangan --}}
                {{-- onShowBagianListener ada di livewire -> add-bagian --}}
                <button wire:click="$emitTo('undangan.add-bagian', 'onShowBagianListener','{{ $undanganId }}')"
                    type="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                    px-6 mt-5 mb-5 focus:outline-none hover:bg-blue-600 rounded {{ $undanganId == null ? 'invisible' : '' }}">Tambah
                    Bagian
                </button>

                @livewire('undangan.undangan-bagian',['id'=>$undanganId])
                @livewire('undangan.add-bagian')
            </div>

            <div class="{{ $jenis == 'bagian' || $jenis == null ? 'hidden' : '' }}">
                <button wire:click="$emitTo('undangan.add-pegawai', 'onShowPegawaiListener','{{ $undanganId }}')"
                    type="button"
                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                     px-6 mt-5 mb-5 focus:outline-none hover:bg-blue-600 rounded {{ $undanganId == null ? 'invisible' : '' }}">Tambah
                    Pegawai
                </button>

                @livewire('undangan.undangan-pegawai',['id'=>$undanganId])
                @livewire('undangan.add-pegawai')
            </div>

            {{-- onShowPegawaiListener ada di livewire -> add-pegawai --}}
            {{-- <button  wire:click="$emitTo('undangan.add-pegawai', 'onShowPegawaiListener','{{ $undanganId }}')"  
            type="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
            px-6 mt-5 mb-5 focus:outline-none hover:bg-blue-600 rounded {{ $undanganId==null ? 'invisible':''  }}">Tambah Pegawai
            </button>
                        
            @livewire('undangan.undangan-pegawai',['id'=>$undanganId])
            @livewire('undangan.add-pegawai') --}}


            {{-- tambah tabel add-undangan pada tabel undangan --}}
            {{-- onShowBagianListener ada di livewire -> add-bagian --}}
            {{-- <button  wire:click="$emitTo('undangan.add-bagian', 'onShowBagianListener','{{ $undanganId }}')"  
            type="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
            px-6 mt-5 mb-5 focus:outline-none hover:bg-blue-600 rounded {{ $undanganId==null ? 'invisible':''  }}">Tambah Bagian
            </button>

            @livewire('undangan.undangan-bagian',['id'=>$undanganId])
            @livewire('undangan.add-bagian') --}}



            <button id="btn_after_save" class="hidden" @click="isBrowseData=true ,isPreviewData=false"></button>
            <button wire:click="store()" type="button"
                class="mt-12 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
            <button @click="isBrowseData=true ,isPreviewData=false" type="reset"
                class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Cancel</button>
        </form>
    </div>


</div>


@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', (event) => {
            window.addEventListener('undangan-after-save', event => {
                document.getElementById('btn_after_save').click();
                // 
            })
        })

    </script>
@endpush
