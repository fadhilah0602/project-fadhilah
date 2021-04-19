<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
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
                                      Undang Bagian
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
                                      </tr>
                                    </thead>
                        
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $no=1;?> 
                                        @foreach ($bagian as $val) 
                                      <tr>
                                      <td class="px-4 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-900">{{ $no }}</div>
                                      </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="flex items-center">
                                            <div class="ml-3">
                                              <div class="text-sm font-medium text-gray-900">
                                                  {{ $val->name }}
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        
                                        <td>
                                            <button type="button" wire:click="addUndanganBagian( {{ $val->id }})" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                                            px-6 focus:outline-none hover:bg-blue-600 rounded">Tambah Data</button>
                                          </td>
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
