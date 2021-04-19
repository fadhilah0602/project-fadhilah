@extends('layouts.app')
@section('content')

{{-- @if (session('message_edit'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erorr!!</strong>
        <span class="block sm:inline">{{ session('message_edit') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>

@endif --}}

        {{-- <div class="alert alert-success">
            {{ session('message') }}
        </div> --}}


<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
            <form action="{{ route('pegawai.update',['id'=>$pegawai->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Data Pegawai</h2>
            @foreach ($errors->all() as $message) 
            @include('sub.message_error',['message'=>$message])
            {{-- <p class="leading-relaxed mb-5 text-gray-600">
                    {{ $message }}
                    </p> --}}
                    @endforeach
            <div class="relative mb-4">
                <label for="photo" class="leading-7 text-sm text-gray-600">Photo</label>
                <input type="file" id="photo" name="photo" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
              <input type="text" id="name" name="name" value="{{ $pegawai->name }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="nip" class="leading-7 text-sm text-gray-600">NIP</label>
              <input type="text" id="nip" name="nip" value="{{ $pegawai->nip }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="jabatan" class="leading-7 text-sm text-gray-600">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ $pegawai->jabatan }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="bagian_id" class="leading-7 text-sm text-gray-600">Bagian</label>
                <select name="bagian_id" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <option value="">---Pilih Bagian---</option>
                        @foreach ($bagian as $val)
                            <option value="{{ $val ->id }}" {!! ($val->id==$pegawai->bagian_id?"selected":"") !!} >{{ $val ->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="relative mb-4">
                    <label for="tanggal_lahir" class="leading-7 text-sm text-gray-600">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                    <label for="jenis_kalamin" class="leading-7 text-sm text-gray-600">Jenis Kelamin</label>
                    <br>
                    <input type="radio" name="jenis_kelamin" value="male" {!! $pegawai->jenis_kelamin  == 'male' ? 'checked':'' !!}>Laki-laki
                    <input type="radio" name="jenis_kelamin" value="female" {!! $pegawai->jenis_kelamin == 'female' ? 'checked':'' !!}>Perempuan
            </div>
            <div class="relative mb-4">
                    <label for="nohp" class="leading-7 text-sm text-gray-600">No HP</label>
                    <input type="text" id="nohp" name="nohp" value="{{ $pegawai->nohp }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ $pegawai->email }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                    <label for="alamat" class="leading-7 text-sm text-gray-600">Alamat</label>
                    <textarea id="alamat" name="alamat" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $pegawai->alamat }}</textarea>
            </div>
            <div class="relative mb-4">
                    <label for="status" class="leading-7 text-sm text-gray-600">Status</label>
                    <select name="status" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">---Pilih Status---</option>
					<option value="1" {!! $pegawai->status == '1' ? 'selected':'' !!}>Aktif</option>
					<option value="0" {!! $pegawai->status == '0' ? 'selected':'' !!}>Tidak Aktif</option>
                    </select>
            </div>
            <div class="relative mb-4">
                <label for="dokumen" class="leading-7 text-sm text-gray-600">Dokumen</label>
                <input type="file" id="dokumen" name="dokumen" accept="application/pdf,application/vnd.ms-excel" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            
            <button type="submit" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
            <button type="reset" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Clear</button>
            
          </div>
            </form>
        </div>
</section>
@endsection

{{-- @extends('layouts.app')
@section('content')
<html>
<head><title>Input Pegawai</title></head>
<body>
    @foreach ($errors->all() as $message) 
    {{ $message }}
    @endforeach
	<h1>Edit Data Pegawai</h1>
    <form action="{{ route('pegawai.update',['id'=>$pegawai->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
	<table>
        <tr>
            <td>Foto</td>
            <td><input type="file" name="photo" accept="image/*"></td>
        </tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="name" value="{{ $pegawai->name }}"></td>
		</tr>
		<tr>
			<td>NIP</td>
			<td><input type="text" name="nip" value="{{ $pegawai->nip }}"></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><input type="text" name="jabatan" value="{{ $pegawai->jabatan }}"></td>
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
            <td><input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><input type="radio" name="jenis_kelamin" value="male" {!! $pegawai->jenis_kelamin  == 'male' ? 'checked':'' !!}>Laki-laki
            <input type="radio" name="jenis_kelamin" value="female" {!! $pegawai->jenis_kelamin == 'female' ? 'checked':'' !!}>Perempuan</td>       
            </td>
            </tr>
		<tr>
        <tr>
            <td>No HP</td>
            <td><input type="number" name="nohp" value="{{ $pegawai->nohp }}"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="{{ $pegawai->email }}"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea rows="5" cols="40" name="alamat" >{{ $pegawai->alamat }}</textarea></td>
        </tr>
        <tr>
			<td>Status</td>
			<td>
				<select name="status">
					<option value="">---Pilih Status---</option>
					<option value="1" {!! $pegawai->status == '1' ? 'selected':'' !!}>Aktif</option>
					<option value="0" {!! $pegawai->status == '0' ? 'selected':'' !!}>Tidak Aktif</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
            <td><input type="submit" name="submit" value="Save">
                <input type="reset" name="reset" value="Clear"></td>
		</tr>
	</table>
    </form>
    
</body>
</html>
@endsection --}}