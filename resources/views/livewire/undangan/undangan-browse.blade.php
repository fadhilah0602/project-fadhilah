<div>
    {{-- Success is as dangerous as failure. --}}




    <div x-data="{isBrowseData : true,isPreviewData : false}" class="mx-auto px-6">
        <div class="w-full"
            x-show="isPreviewData"
            {{-- x-show="isPreviewData && isBrowseData" --}}
            x-transition:enter="transition ease-in duration-500"
            x-transition:enter-start="opacity-0 transform translate-y-20" 
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-out duration-500" 
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform translate-y-20" style="display: none">
            @livewire('undangan.show-undangan', ['id' => null])
            <!-- SHOW AREA--> 
            
        </div>
        <div class="w-full"
            x-show="!isBrowseData" {{-- jika true datanya flase dan sebaliknya --}}
            x-transition:enter="transition ease-in duration-500"
            x-transition:enter-start="opacity-0 transform translate-y-20" 
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-out duration-500" 
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform translate-y-20" style="display: none">
            @livewire('undangan.add-undangan', ['id' => null]) {{-- berdasarkan variabel mount --}}
            <!-- ADD EDIT AREA-->
            
        </div>
        <div class="flex flex-col flex-1 mb-6">
            <div x-show="isBrowseData && !isPreviewData" 
                x-transition:enter="transition ease-in duration-500"
                x-transition:enter-start="opacity-0 transform translate-y-20" 
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-out duration-500" 
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform translate-y-20"            
                class="w-full">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                
                              <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  No
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Judul
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Lokasi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Tanggal Mulai
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Tanggal Akhir
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Jenis
                                </th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Keterangan
                                </th> --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  File Undangan
                                </th>
                
                              </tr>
                            </thead>
                
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $no=1;?> 
                                @foreach ($undangan as $val) 
                              <tr>
                              
                              <td class="px-4 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{ $no }}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $val->judul }}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $val->lokasi }}</div>
                              </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{ $val->tanggal_mulai }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $val->tanggal_akhir }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $val->jenis }}</div>
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                      {{ $val->jenis ==1?'pegawai':'bagian' }}
                                  </span>
                                </td> --}}
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $val->keterangan }}</div>
                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">
                                    @if($val->file_undangan!=null)
                                      <a href="{{ url($val->file_undangan) }}" target="_blank">Download</a>
                                    @endif 
                                  </div>
                                </td>
                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    
                                      <button wire:click="$emitTo('undangan.add-undangan', 'onEditUndangan','{{ $val->id }}')"  @click="isBrowseData = false,isPreviewData=false" class="text-blue-700 py-1 px-2  rounded-md">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                        </svg>
                                      </button>
                                    
                                    
                                      <button wire:click="$emitTo('undangan.show-undangan', 'onShowUndangan','{{ $val->id }}')"  @click="isBrowseData = true,isPreviewData=true" class="text-green-700 py-1 px-2  rounded-md">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                      </button>
                                    
                                    
                                      <button wire:click="destroy({{ $val->id }})" class="text-red-700 py-1 px-2  rounded-md">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                      </button>
                                    
                                </td>
                              </tr>
                  
                              <!-- More items... -->
                              <?php $no++ ;?>
                              @endforeach
                            </tbody>
                          </table>
                          
                            <button  @click="isBrowseData = false,isPreviewData=false" wire:click="$emitTo('undangan.add-undangan', 'onAddUndangan')" class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                            </button>
                          
                        </div>
                      </div>
                    </div>
                </div>
                <!-- BROWSE AREA-->
            </div>
        </div>

    </div>




    
    
      

</div>
