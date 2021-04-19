
@extends('layouts.app')
@section('content')

@if (session('message_delete'))
  @include('sub.message_error',['message'=>session('message_delete')])
@endif

@if (session('message_del'))
  @include('sub.message_error',['message'=>session('message_del')])
@endif

@if(session('message_edit'))
  @include('sub.message_edit',['message_edit'=>session('message_edit')])
@endif

@if(session('message_create'))
  @include('sub.message_create',['message_create'=>session('message_create')])
@endif

{{-- @if (session('message_delete'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ session('message_delete') }}</strong>
        <span class="block sm:inline"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div> 
@endif
@if(session('message_edit'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ session('message_edit') }}</strong>
        <span class="block sm:inline"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
@endif
@if(session('message_create'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ session('message_create') }}</strong>
        <span class="block sm:inline"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-blue-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
@endif --}}
        {{-- <div class="alert alert-success">
            {{ session('message') }}
        </div> --}}


<!-- This example requires Tailwind CSS v2.0+ -->
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
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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
                </td>
              </tr>
  
              <!-- More items... -->
              <?php $no++ ;?>
              @endforeach
            </tbody>
          </table>
          <a href=" {{ route('pegawai.create') }}" >
            <button class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
  
@endsection 



{{-- index biasaaa pake tabel --}}
{{-- @extends('layouts.app')
@section('content')
 <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<table  cellpadding="1" cellspacing="1" width="100%" class="auto bg-emerald-200" class="w-16 md:w-32 lg:w-48" >
    <tr class="bg-emerald-200" >
        <th class="bg-blue-300 border">No</th>
        <th class="bg-blue-300 border">Nama</th>
        <th class="bg-blue-300 border">NIP</th>
        <th class="bg-blue-300 border">Jabatan</th>
        <th class="bg-blue-300 border">Bagian</th>
        <th class="bg-blue-300 border">Tanggal Lahir</th>
        <th class="bg-blue-300 border">Jenis Kelamin</th>
        <th class="bg-blue-300 border">No HP</th>
        <th class="bg-blue-300 border">Email</th>
        <th class="bg-blue-300 border">Alamat</th>
        <th class="bg-blue-300 border">Status</th>
        <th class="bg-blue-300 border">Aksi</th>
    </tr>
    
<tbody>
     {{-- <?php $no=1;?>  --}}
     {{-- @foreach ($pegawai as $val)
        <tr>

                <td class="border px-4 py-2">{{ $no }}</td>
                <td >{{ $val->name }}</td>
                <td >{{ $val->nip }}</td>
                <td >{{ $val->jabatan }}</td>
                <td >{{ $val->bagian_id!=null?$val->bag->name:"" }}</td>
                <td >{{ $val->tanggal_lahir }}</td>
                <td >{{ $val->jenis_kelamin=='male'?'Laki-laki':'Perempuan' }}</td>
                <td >{{ $val->nohp }}</td>
                <td >{{ $val->email }}</td>
                <td >{{ $val->alamat }}</td>
                <td >{{ $val->status ==1?'Aktif':'Tidak Aktif' }}</td>
                <td >
                    <div>
                    <a href=" {{ route('pegawai.edit',['id'=>$val->id]) }}" ><button class="text-white py-1 px-2  rounded-md"><img src="/image/photo/ed1.png"></button></a>
                     <a href=" {{ route('pegawai.show',['id'=>$val->id]) }}"><button class="text-white py-1 px-2 bg-blue-500 hover:bg-blue-700 rounded-md">View</button></a> 
                     <a href=" {{ route('pegawai.show',['id'=>$val->id]) }}"><button class="text-white py-1 px-2  rounded-md"><img src="/image/photo/eyes1.png"></button></a>
                    <a href=" {{ route('pegawai.delete',['id'=>$val->id]) }}"><button class="text-white py-1 px-2  rounded-md"><img src="/image/photo/delete1.png"></button></a>
                    </div>
                </td>
            </tr> 
     {{-- <?php $no++ ;?> --}}
    {{-- @endforeach   --}}
    
{{-- </tbody>
</table>
<a href=" {{ route('pegawai.create') }}" >
<button class="flex ml-auto text-white bg-purple-500 border-0 py-2 
px-6 focus:outline-none hover:bg-purple-600 rounded">Tambah Data</button></a>  --}}

{{-- menampilkan biasaa --}}
{{-- <tbody> -> untuk menampilkan biasa
        <tr>
                <td>{{ $pegawai->id }}</td>
                <td>{{ $pegawai->name }}</td>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->jabatan }}</td>
                <td>{{ $pegawai->bagian }}</td>
                <td>{{ $pegawai->tanggal_lahir }}</td>
                <td>{{ $pegawai->jenis_kelamin }}</td>
                <td>{{ $pegawai->nohp }}</td>
                <td>{{ $pegawai->email }}</td>
                <td>{{ $pegawai->alamat }}</td>
                <td>{{ $pegawai->status }}</td>
                <td></td>
            </tr>

</tbody>
</table> 
@endsection  --}}