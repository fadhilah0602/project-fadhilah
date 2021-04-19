@extends('layouts.app')
@section('content')

    <section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Input User</h2>
                    @foreach ($errors->all() as $message)
                        <p class="leading-relaxed mb-5 text-gray-600">
                            {{ $message }}
                        </p>
                    @endforeach
                    <div class="relative mb-4">
                        <label for="photo" class="leading-7 text-sm text-gray-600">Photo</label>
                        <input type="file" id="photo" name="photo"
                            class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>

                    {{-- menambahkan field role_id --}}

                    <div class="relative mb-4">
                        <label for="role_id" class="leading-7 text-sm text-gray-600">Role ID</label>
                        <select name="role_id"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">---Pilih Role ID---</option>
                            @foreach ($role as $val)
                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative mb-4">
                        <label for="pegawai_id" class="leading-7 text-sm text-gray-600">Pegawai ID</label>
                        <select name="pegawai_id"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">---Pilih Pegawai ID---</option>
                            @foreach ($pegawai as $val)
                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="relative mb-4">
                        <label for="role_id" class="leading-7 text-sm text-gray-600">Role ID</label>
                        <input type="text" id="role_id" name="role_id" value="{{ old('role_id') }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div> --}}


                    <button type="submit"
                        class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                    <button type="reset"
                        class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Clear</button>

                </div>
            </form>
        </div>
    </section>
@endsection
