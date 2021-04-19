<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}



<section class="text-gray-600 body-font">
    <div class="container px-5 py-6 mx-auto flex flex-wrap">

        <div class="md:w-2/5 md:pr-6 ">
            <div class="flex items-center w-full p-6">

                <div class="w-full">
                    <div class="bg-white shadow-xl rounded-lg py-3">
                        <div class="photo-wrapper p-2">
                            <img class="w-32 h-32 rounded-full mx-auto"
                                src="{{ $pegawai->photo != null ? url($pegawai->photo) : '' }}" alt="John Doe">
                        </div>
                        <div class="p-2">
                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ $pegawai->name }}
                            </h3>
                            <div class="text-center text-gray-400 text-xs font-semibold">
                                <p>{{ $pegawai->jabatan }}</p>
                            </div>
                            <table class="text-xs my-3">
                                <tbody>
                                    <tr>
                                        <td class="px-2 py-2 text-gray-500 font-semibold">Bagian</td>
                                        <td class="px-2 py-2">{{ $pegawai->bag->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-gray-500 font-semibold">Alamat</td>
                                        <td class="px-2 py-2">{{ $pegawai->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-gray-500 font-semibold">No HP</td>
                                        <td class="px-2 py-2">{{ $pegawai->nohp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                        <td class="px-2 py-2">{{ $pegawai->email }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="md:w-3/5  ">
            <h1 class="text-lg py-3 font-semibold">
                Undangan Saya
            </h1>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">

                    <tr>
                        <th scope="col"
                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Judul
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lokasi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Mulai
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Akhir
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            File Undangan
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kelola
                        </th>
                        

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no = 1; ?>
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
                                <div class="text-sm text-gray-900">
                                    @if ($val->file_undangan != null)
                                        <a href="{{ url($val->file_undangan) }}" target="_blank">Download</a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <button type="button" wire:click="$emitTo('undangan.kelola-undangan-bagian', 'onShowKelolaUndanganBagian','{{ $val->id }}')"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-6 py-1 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Kelola
                                 </button>
                            </td>

                        </tr>

                        <!-- More items... -->
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
            
            <div class="w-full">
                @livewire('undangan.kelola-undangan-bagian')
            </div>
        </div>
    </div>
</section>


</div>

