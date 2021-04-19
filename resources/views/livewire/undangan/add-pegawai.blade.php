<div>
  @if($isShow=='true')
      <div  x-data="{togleModalPegawai : {{$isShow}} }">        
          <div class="fixed z-10 inset-0" x-show="togleModalPegawai">
              <div class="flex items-end overflow-hidden justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">                    
                  <div x-show="togleModalPegawai" x-transition:enter="ease-out duration-300"
                      x-transition:enter-start="opacity-0" -transition:enter-end="opacity-100"
                      x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-300"
                      x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
                      <div class="absolute inset-0 bg-gray-500 opacity-50"></div>
                  </div>
                  <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

                  <div x-show="togleModalPegawai" x-show.transition="togleModalPegawai"
                      x-transition:enter="ease-out duration-300"
                      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                      x-transition:leave="ease-in duration-200"
                      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                      class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-6xl sm:w-full"
                      role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                      <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                          <div class="sm:flex sm:items-start">                            
                              <div class="mb-3">
                                  <h3 class=" text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-headline">
                                      Undang Pegawai
                                  </h3>
                                  
                              </div>
                          </div>
                          <div class="w-full">
                             <!-- search -->
                          </div> 
                          <div class="w-full overflow-auto" style="height:65vh; min-height:65vh min-width:100vh; "> 
                                            
                                                      
                                  
                              <div class="w-full scrolling-auto">                                        
                                <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-50">
                                      
                                    <tr>
                                      <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jabatan
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Bagian
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dokumen
                                      </th>
                      
                                    </tr>
                                  </thead>
                      
                                  <tbody class="bg-white divide-y divide-gray-200">
                                      <?php $no=1;?> 
                                      @foreach ($pegawai as $val) 
                                    <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $no }}</div>
                                    </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ url($val->photo!=null?$val->photo:'')}}" alt="">
                                          </div>
                                          <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $val->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $val->email }}
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $val->jabatan }}</div>
                                        {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">{{ $val->bagian_id!=null?$val->bag->name:"" }}</div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $val->status ==1?'Aktif':'Tidak Aktif' }}
                                        </span>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                          @if($val->dokumen!=null)
                                            <a href="{{ url($val->dokumen) }}" target="_blank">Download</a>
                                          @endif
                                           
                                        </div>
                                        {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                      </td>
                                      {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Admin
                                      </td> --}}
                                      <td>
                                        <button type="button" wire:click="addUndanganPegawai( {{ $val->id }})" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                                        px-6 focus:outline-none hover:bg-blue-600 rounded">Tambah Data</button>
                                      </td>
                                      {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                          <a href=" {{ route('pegawai.edit',['id'=>$val->id]) }}" >
                                            <button class="text-blue-700 py-1 px-2  rounded-md">
                                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                              </svg>
                                            </button>
                                          </a>
                                          <a href=" {{ route('pegawai.show',['id'=>$val->id]) }}">
                                            <button class="text-green-700 py-1 px-2  rounded-md">
                                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                            </button>
                                          </a>
                                          <a href=" {{ route('pegawai.delete',['id'=>$val->id]) }}">
                                            <button class="text-red-700 py-1 px-2  rounded-md">
                                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            </button>
                                          </a>
                                      </td> --}}
                                    </tr>
                        
                                    <!-- More items... -->
                                    <?php $no++ ;?>
                                    @endforeach
                                  </tbody>
                              </table>
                              </div>
                                  
                              
                          </div>
                          <!-- page ination -->
                      </div>
                      <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                         
                          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                              <button wire:click="hide()" type="button"
                                  class="inline-flex justify-center w-full rounded-md border border-gray-300 px-6 py-1 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                  Batal
                              </button>
                          </span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endif
</div>







