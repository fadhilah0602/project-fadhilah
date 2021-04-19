@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
            <form action="{{ route('undangan_bagian.update',['id'=>$undangan_bagian->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Undangan Bagian</h2>
            @foreach ($errors->all() as $message) 
            @include('sub.message_error',['message'=>$message])
            
            @endforeach
            
            <div class="relative mb-4">
              <label for="undangan_id" class="leading-7 text-sm text-gray-600">Undangan ID</label>
              <input type="text" id="undangan_id" name="undangan_id" value="{{ $undangan_bagian->undangan_id }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="bagian_id" class="leading-7 text-sm text-gray-600">Bagian ID</label>
              <input type="text" id="bagian_id" name="bagian_id" value="{{ $undangan_bagian->bagian_id }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>

            
            <button type="submit" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
            <button type="reset" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Clear</button>
            
          </div>
            </form>
        </div>
      </section>
@endsection 