<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div class="flex flex-col">

        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
              
            <tr>
              <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No
              </th>
              <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Bagian 
              </th>

            </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200">
              <?php $no=1;?> 
              @if($undanganBagian!=null && $undanganBagian->count()>=1)
              @foreach ($undanganBagian as $val) 
            <tr>
            
            <td class="px-4 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $no }}</div>
            </td>
 
              <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $val->bagian->name }}</div>
              </td>

              <td class="text-right"> {{-- untuk menghapus bagian --}}
              <button type="button" wire:click="destroy({{ $val->id }})" class="text-red-700 py-1 px-2  rounded-md">
                <svg class="align-right w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
              </button>
              </td>

            </tr>

            <!-- More items... -->
            <?php $no++ ;?>
            @endforeach
            @endif
          </tbody>
        </table>
    </div>

</div>
