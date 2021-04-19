<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="mb-3">
        <div>

            <div class="flex flex-col  overflow-hidden md:flex-row">
                <div class="w-full md:flex md:w-1/2">
                    <div class="w-full flex justify-start mt-2">
                        <div class="w-full inline-block relative ">

                            <input wire:model="bagianId" type="hidden">
                            <input wire:model.defer="namaBagian" type="text"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>

                </div>
                <div class="flex md:flex-1">
                    <div class="w-full">
                        <div class="flex text-sm justify-start mt-2">
                            <div class="inline-block relative lg:w-48 w-full">

                                @if ($this->bagianId != null)
                                    <button wire:click="store()" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                                    px-6 focus:outline-none hover:bg-blue-600 rounded">Edit Data</button></a>

                                @else
                                    <button wire:click="store()" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 
                                    px-6 focus:outline-none hover:bg-blue-600 rounded">Tambah Data</button></a>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($message != null)
        @include('sub.message_error',['message'=>$message])
    @endif
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $no = 1; ?>
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

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex-inline">

                                            <button class="text-blue-700 py-1 px-2  rounded-md">
                                                <svg wire:click="edit('{{ $val->id }}')" class="w-6 h-6"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>

                                            {{-- <a>
                            <button class="text-green-700 py-1 px-2  rounded-md">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                            </button>
                          </a> --}}

                                            <button class="text-red-700 py-1 px-2  rounded-md">
                                                <svg wire:click="delete('{{ $val->id }}')" class="w-6 h-6"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>

                                        </div>
                                    </td>
                                </tr>

                                <!-- More items... -->
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
