{{-- @if (session('message'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erorr!!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>

        {{-- <div class="alert alert-success">
            {{ session('message') }}
        </div> 
@endif --}}
@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
            <form action="{{ route('user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit User</h2>
            @foreach ($errors->all() as $message) 
            <p class="leading-relaxed mb-5 text-gray-600">
                    {{ $message }}
                    </p>
                    @endforeach
            <div class="relative mb-4">
                <label for="photo" class="leading-7 text-sm text-gray-600">Photo</label>
                <input type="file" id="photo" name="photo" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
              <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
              <input type="password" id="password" name="password" value="" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>

            {{-- menambahkan field role_id --}}
            <div class="relative mb-4">
              <label for="role_id" class="leading-7 text-sm text-gray-600">Role ID</label>
              <select name="role_id"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">---Pilih Role ID---</option>
                            @foreach ($role as $val)
                                <option value="{{ $val->id }}"{{ $val->id==$user->role_id ? 'selected' :'' }}>{{ $val->name }}</option>
                            @endforeach
              </select>
            </div>

            <div class="relative mb-4">
              <label for="pegawai_id" class="leading-7 text-sm text-gray-600">Pegawai ID</label>
              <select name="pegawai_id"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">---Pilih Pegawai ID---</option>
                            @foreach ($pegawai as $val)
                                <option value="{{ $val->id }}"{{ $val->id==$user->pegawai_id ? 'selected' :'' }}>{{ $val->name }}</option>
                            @endforeach
              </select>
            </div>


            <button type="submit" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
            <button type="reset" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Clear</button>
            
          </div>
            </form>
        </div>
</section>
@endsection