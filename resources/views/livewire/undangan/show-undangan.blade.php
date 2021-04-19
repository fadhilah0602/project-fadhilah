<div>
    @if($undanganId!=null)

    <div class="container px-5  lg:w-1/2 w-full">
        <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
          <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Detail Undangan</h2>

          <div class="relative mb-4">
                  <div class="flex flex-row w-full">
                      <div class="w-64">
                          <label for="judul" class="leading-7 text-md font-bold text-gray-900">Judul</label>  
                      </div>
                      <div>
                          <label for="judul" class="leading-7 text-sm text-gray-600">{{ $undangan->judul }}</label>
                      </div>
                  </div>
          </div>
          <div class="relative mb-4">
              <div class="flex flex-row w-full">
                  <div class="w-64">
                      <label for="lokasi" class="leading-7 text-md font-bold text-gray-900">Lokasi</label>  
                  </div>
                  <div>
                      <label for="lokasi" class="leading-7 text-sm text-gray-600">{{ $undangan->lokasi }}</label>
                  </div>
              </div>
          </div>

          <div class="relative mb-4">
                  <div class="flex flex-row w-full">
                      <div class="w-64">
                          <label for="tanggal_mulai" class="leading-7 text-md font-bold text-gray-900">Tanggal Mulai</label>  
                  </div>
                  <div>
                          <label for="tanggal_mulai" class="leading-7 text-sm text-gray-600">{{ $undangan->tanggal_mulai }}</label>
                  </div>
          </div>
          <div class="relative mb-4">
              <div class="flex flex-row w-full">
                  <div class="w-64">
                      <label for="tanggal_akhir" class="leading-7 text-md font-bold text-gray-900">Tanggal Akhir</label>  
              </div>
              <div>
                      <label for="tanggal_akhir" class="leading-7 text-sm text-gray-600">{{ $undangan->tanggal_akhir }}</label>
              </div>
              </div>
          </div>
          <div class="relative mb-4">
              <div class="flex flex-row w-full">
                  <div class="w-64">
                      <label for="jenis" class="leading-7 text-md font-bold text-gray-900">Jenis</label>  
              </div>
              <div>
                      <label for="jenis" class="leading-7 text-sm text-gray-600">{{  $undangan->jenis  }}</label>
              </div>
          </div>
          </div>

          <div class="relative mb-4">
                  <div class="flex flex-row w-full">
                      <div class="w-64">
                          <label for="keterangan" class="leading-7 text-md font-bold text-gray-900">Keterangan</label>  
                  </div>
                  <div>
                          <label for="keterangan" class="leading-7 text-sm text-gray-600">{{ $undangan->keterangan }}</label>
                  </div>
          </div>
          
        </div>
        
    @endif
    @livewire('undangan.undangan-pegawai',['id'=>$undanganId])
    
    <button @click="isBrowseData=true ,isPreviewData=false" type="button" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Cancel</button>


</div>
