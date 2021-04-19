@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Detail User</h2>

            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                        <label for="photo" class="leading-7 text-md font-bold text-gray-900">Photo</label>
                        </div>
                        <div class="flex-shrink-0 h-32 w-32">
                                <img class="h-32 w-32 rounded-full" src="{{ url($user->photo!=null?$user->photo:'')}}" alt="">
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
                            <label for="name" class="leading-7 text-sm text-gray-600">{{ $user->name }}</label>
                    </div>
            </div>
            
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="email" class="leading-7 text-md font-bold text-gray-900">Email</label>  
                    </div>
                    <div>
                            <label for="email" class="leading-7 text-sm text-gray-600">{{ $user->email }}</label>
                    </div>
            </div>

      </section>
@endsection
