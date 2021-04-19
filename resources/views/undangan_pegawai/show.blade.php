@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Detail Undangan</h2>

            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="undangan_id" class="leading-7 text-md font-bold text-gray-900">Undangan ID</label>  
                        </div>
                        <div>
                            <label for="undangan_id" class="leading-7 text-sm text-gray-600">{{ $undangan_pegawai->undangan_id }}</label>
                        </div>
                    </div>
            </div>
            <div class="relative mb-4">
                <div class="flex flex-row w-full">
                    <div class="w-64">
                        <label for="pegawai_id" class="leading-7 text-md font-bold text-gray-900">Pegawai ID</label>  
                    </div>
                    <div>
                        <label for="pegawai_id" class="leading-7 text-sm text-gray-600">{{ $undangan_pegawai->pegawai_id }}</label>
                    </div>
                </div>
        </div>
            
      </section>

@endsection