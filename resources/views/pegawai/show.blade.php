@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Detail Data Pegawai</h2>

            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                        <label for="photo" class="leading-7 text-md font-bold text-gray-900">Photo</label>
                        </div>
                        <div class="flex-shrink-0 h-32 w-32">
                                <img class="h-32 w-32 rounded-full" src="{{ url($pegawai->photo!=null?$pegawai->photo:'')}}" alt="">
                        </div>  
                    </div>
                    <div>
                        
                    </div>
            </div>
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="name" class="leading-7 text-md font-bold text-gray-900">Nama</label>  
                    </div>
                    <div>
                            <label for="name" class="leading-7 text-sm text-gray-600">{{ $pegawai->name }}</label>
                    </div>
            </div>
            <div class="relative mb-4">
                <div class="flex flex-row w-full">
                    <div class="w-64">
                        <label for="nip" class="leading-7 text-md font-bold text-gray-900">NIP</label>  
                </div>
                <div>
                        <label for="nip" class="leading-7 text-sm text-gray-600">{{ $pegawai->nip }}</label>
                </div>
            </div>

            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="jabatan" class="leading-7 text-md font-bold text-gray-900">Jabatan</label>  
                    </div>
                    <div>
                            <label for="jabatan" class="leading-7 text-sm text-gray-600">{{ $pegawai->jabatan }}</label>
                    </div>
            </div>
            
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="bagian_id" class="leading-7 text-md font-bold text-gray-900">Bagian</label>  
                    </div>
                    <div>
                            <label for="bagian_id" class="leading-7 text-sm text-gray-600">{{ $pegawai->bagian_id!=null?$pegawai->bag->name:"" }}</label>
                    </div>
            </div>

            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="tanggal_lahir" class="leading-7 text-md font-bold text-gray-900">Tanggal Lahir</label>  
                    </div>
                    <div>
                            <label for="tanggal_lahir" class="leading-7 text-sm text-gray-600">{{ $pegawai->tanggal_lahir }}</label>
                    </div>
            </div>

            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="jenis_kelamin" class="leading-7 text-md font-bold text-gray-900">Jenis Kelamin</label>  
                    </div>
                    <div>
                            <label for="jenis_kelamin" class="leading-7 text-sm text-gray-600">{!! $pegawai->jenis_kelamin  == 'male' ? 'Laki-laki':'Perempuan' !!}</label>
                    </div>
            </div>
            
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="nohp" class="leading-7 text-md font-bold text-gray-900">No HP</label>  
                    </div>
                    <div>
                            <label for="nohp" class="leading-7 text-sm text-gray-600">{{ $pegawai->nohp }}</label>
                    </div>
            </div>
            
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="email" class="leading-7 text-md font-bold text-gray-900">Email</label>  
                    </div>
                    <div>
                            <label for="email" class="leading-7 text-sm text-gray-600">{{ $pegawai->email }}</label>
                    </div>
            </div>
            
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="alamat" class="leading-7 text-md font-bold text-gray-900">Alamat</label>  
                    </div>
                    <div>
                            <label for="alamat" class="leading-7 text-sm text-gray-600">{{ $pegawai->alamat }}</label>
                    </div>
            </div>
            
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="status" class="leading-7 text-md font-bold text-gray-900">Status</label>  
                    </div>
                    <div>
                            <label for="status" class="leading-7 text-sm text-gray-600">{!! $pegawai->status == '1' ? 'Aktif':'Tidak Aktif' !!}</label>
                    </div>
                </div>
          </div>
        </div>
      </section>

@endsection







{{-- <html>
<head><title>Lihat Data Pegawai</title></head>
<body>
	<h1>Lihat Data Pegawai</h1>
	<table>
        <tr>
            <td></td>
            <td><img src="{{ url($pegawai->photo!=null?$pegawai->photo:'')}}"></td>
        </tr>
		<tr>
            <td>Nama </td>
			<td>{{ $pegawai->name }}</td>
		</tr>
		<tr>
			<td>NIP</td>
			<td>{{ $pegawai->nip }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>{{ $pegawai->jabatan }}</td>
        </tr>
        <tr>
            <td>Bagian</td>
            <td>{{ $pegawai->bagian_id!=null?$pegawai->bag->name:"" }}</td>
            </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>{{ $pegawai->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{!! $pegawai->jenis_kelamin  == 'male' ? 'Laki-laki':'Perempuan' !!}</td>       
            </td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>{{ $pegawai->nohp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $pegawai->email }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ $pegawai->alamat }}</td>
        </tr>
        <tr>
			<td>Status</td>
			<td>
					{!! $pegawai->status == '1' ? 'Aktif':'Tidak Aktif' !!}
			</td>
		</tr>
	</table>
    
</body>
</html> --}}