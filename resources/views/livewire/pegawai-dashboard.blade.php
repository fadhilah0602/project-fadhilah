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
            {{-- undangan yang akan datang --}}
            <h1 class="text-lg py-3 font-semibold">
                Undangan Akan Datang
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
                            Status Konfirmasi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status Hadir
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

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @php
                                
                                    $undanganp=App\UndanganPegawai::where('undangan_id',$val->id)->where('pegawai_id',$pegawai->id)->first();
                                
                                @endphp
    
                                @if($undanganp->status_konfirmasi == 'Belum')
                                    <button wire:click="$emitTo('undangan.update-status-undangan', 'onShowUpdateStatusUndanganListener','{{ $val->id }}','status_konfirmasi')" 
                                    class="text-white py-1 px-2 bg-green-500 hover:bg-green-700 rounded-md">Konfirmasi</button>
                                @else
                                    <span class="bg-green-400 px-2 py-1 rounded-lg">Sudah</span>
                                @endif
                                {{-- {{ $undanganp->status_konfirmasi }} --}}
    
                            </td>
    
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if($undanganp->status_konfirmasi == 'Sudah')

                                @if($undanganp->status_kehadiran == 'Hadir')
                                    <span class="bg-green-400 px-2 py-1 rounded-lg">Hadir</span>
                                @elseif($undanganp->status_kehadiran == 'Tidak')
                                    <button wire:click="$emitTo('undangan.update-status-undangan', 'onShowUpdateStatusUndanganListener','{{ $val->id }}','status_kehadiran')"
                                    class="text-white py-1 px-2 bg-green-500 hover:bg-green-700 rounded-md">Konfirmasi Hadir</button>
                                @else
                                    <span class="bg-yellow-400 px-2 py-1 rounded-lg">Belum Konfirmasi</span>
                                @endif

                                @else
                                    @if($undanganp->kehadiran == 'Hadir')
                                        <span class="bg-green-400 px-2 py-1 rounded-lg">Hadir</span>
                                    @elseif($undanganp->status_kehadiran == 'Tidak')
                                        <span class="bg-red-400 px-2 py-1 rounded-lg">Tidak Hadir</span>
                                    @else
                                    <span class="bg-yellow-400 px-2 py-1 rounded-lg">Belum Konfirmasi</span>
                                    @endif
                                @endif
                                {{-- {{ $undanganp->status_kehadiran }} --}}
                            </td>
                            
                        </tr>

                        <!-- More items... -->
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>

            {{-- undangan histori --}}
            <h1 class="text-lg py-3 font-semibold">
                History Undangan
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
                            Status Konfirmasi
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status Kehadiran
                        </th>
                        

                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no = 1; ?>
                    @foreach ($historyundangan as $val)
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

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @php
                            
                                $undanganp=App\UndanganPegawai::where('undangan_id',$val->id)->where('pegawai_id',$pegawai->id)->first();
                            
                            @endphp

                            @if($undanganp->status_konfirmasi == 'Belum')
                                <span class="bg-yellow-400 px-2 py-1 rounded-lg">Belum</span>
                            @else
                                <span class="bg-green-400 px-2 py-1 rounded-lg">Sudah</span>
                            @endif
                            {{-- {{ $undanganp->status_konfirmasi }} --}}

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if($undanganp->kehadiran == 'Hadir')
                                <span class="bg-green-400 px-2 py-1 rounded-lg">Hadir</span>
                            @elseif($undanganp->status_kehadiran == 'Tidak')
                                <span class="bg-red-400 px-2 py-1 rounded-lg">Tidak Hadir</span>
                            @else
                            <span class="bg-yellow-400 px-2 py-1 rounded-lg">Belum Konfirmasi</span>
                            @endif
                            {{-- {{ $undanganp->status_kehadiran }} --}}
                        </td>
                        </tr>

                        <!-- More items... -->
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>


@livewire('undangan.update-status-undangan');
