@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
            <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Input Data Pegawai</h2>
            @foreach ($errors->all() as $message) 
            @include('sub.message_error',['message'=>$message])
            {{-- <p class="leading-relaxed mb-5 text-gray-600">
                    {{ $message }}
            </p> --}}
                    @endforeach
            <div class="relative mb-4">
                <label for="photo" class="leading-7 text-sm text-gray-600">Photo</label>
                <input type="file" id="photo" name="photo" accept="image/x-png,image/gif,image/jpeg" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="nip" class="leading-7 text-sm text-gray-600">NIP</label>
              <input type="text" id="nip" name="nip" value="{{ old('nip') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="jabatan" class="leading-7 text-sm text-gray-600">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="bagian_id" class="leading-7 text-sm text-gray-600">Bagian</label>
                <select name="bagian_id" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <option value="">---Pilih Bagian---</option>
                        @foreach ($bagian as $val)
                            <option value="{{ $val ->id }}">{{ $val ->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="relative mb-4">
                    <label for="tanggal_lahir" class="leading-7 text-sm text-gray-600">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                    <label for="jenis_kelamin" class="leading-7 text-sm text-gray-600">Jenis Kelamin</label>
                    <br>
                    <input type="radio" name="jenis_kelamin" value="male" {!! old('jenis_kelamin') == 'male' ? 'checked':'' !!}>Laki-laki 
                    <input type="radio" name="jenis_kelamin" value="female" {!! old('jenis_kelamin') == 'female' ? 'checked':'' !!}>Perempuan
            </div>
            <div class="relative mb-4">
                    <label for="nohp" class="leading-7 text-sm text-gray-600">No HP</label>
                    <input type="text" id="nohp" name="nohp" value="{{ old('nohp') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                    <label for="alamat" class="leading-7 text-sm text-gray-600">Alamat</label>
                    <textarea id="alamat" name="alamat" value="{{ old('alamat') }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
            </div>
            <div class="relative mb-4">
                    <label for="status" class="leading-7 text-sm text-gray-600">Status</label>
                    <select name="status" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            
                        
                           
                                    <option value="">---Pilih Status---</option>
                                    <option value="1" {!! old('status') == '1' ? 'selected':'' !!}>Aktif</option>
                                    <option value="0" {!! old('status') == '0' ? 'selected':'' !!}>Tidak Aktif</option>   
                    </select>
            </div>
            {{-- <div class="relative mb-4">
                <label for="dokumen" class="leading-7 text-sm text-gray-600">Dokumen</label>
                <input type="file" id="dokumen" name="dokumen" accept="application/pdf,application/vnd.ms-excel" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div> --}}
            <button type="submit" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
            <button type="reset" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Clear</button>
            
          </div>
            </form>
        </div>
      </section>
@endsection     
{{-- 
<h1>Input Data Pegawai</h1>
<form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
    @csrf --}}
{{-- <table>
    <tr>
        <td>Foto</td>
        <td><input type="file" name="photo" accept="image/*"></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input type="text" name="name" value="{{ old('name') }}"></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td><input type="text" name="nip" value="{{ old('nip') }}"></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td><input type="text" name="jabatan" value="{{ old('jabatan') }}"></td>
    </tr>
    <tr>
        <td>Bagian</td>
        <td>				
            <select name="bagian_id">
                <option value="">---Pilih Bagian---</option>
                @foreach ($bagian as $val)
                    <option value="{{ $val ->id }}">{{ $val ->name }}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><input type="radio" name="jenis_kelamin" value="male" {!! old('jenis_kelamin') == 'male' ? 'checked':'' !!}>Laki-laki
        <input type="radio" name="jenis_kelamin" value="female" {!! old('jenis_kelamin') == 'female' ? 'checked':'' !!}>Perempuan</td>       
        </td>
        </tr>
    <tr>
    <tr>
        <td>No HP</td>
        <td><input type="number" name="nohp" value="{{ old('nohp') }}"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="{{ old('email') }}"></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><textarea rows="5" cols="40" name="alamat" >{{ old('alamat') }}</textarea></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <select name="status">
                <option value="">---Pilih Status---</option>
                <option value="1" {!! old('status') == '1' ? 'selected':'' !!}>Aktif</option>
                <option value="0" {!! old('status') == '0' ? 'selected':'' !!}>Tidak Aktif</option>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Save">
            <input type="reset" name="reset" value="Clear"></td>
    </tr>
</table> --}}
{{-- </form> --}}

