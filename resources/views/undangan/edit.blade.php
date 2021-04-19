@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
            <form action="{{ route('undangan.update',['id'=>$undangan->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Undangan</h2>
            @foreach ($errors->all() as $message) 
            @include('sub.message_error',['message'=>$message])

            @endforeach

            <div class="relative mb-4">
                <label for="judul" class="leading-7 text-sm text-gray-600">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ $undangan->judul }}"  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <div class="relative mb-4">
                <label for="lokasi" class="leading-7 text-sm text-gray-600">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ $undangan->lokasi }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <div class="relative mb-4">
                  <label for="tanggal_mulai" class="leading-7 text-sm text-gray-600">Tanggal Mulai</label>
                  <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ $undangan->tanggal_mulai }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <div class="relative mb-4">
                  <label for="tanggal_akhir" class="leading-7 text-sm text-gray-600">Tanggal Akhir</label>
                  <input type="date" id="tanggal_akhir" name="tanggal_akhir" value="{{ $undangan->tanggal_akhir }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <div class="relative mb-4">
                  <label for="jenis" class="leading-7 text-sm text-gray-600">Jenis</label>
                  <select name="jenis" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">---Pilih Jenis---</option>
                            <option value="1" {!! $undangan->jenis == '1' ? 'selected':'' !!}>Pegawai</option>
                            <option value="0" {!! $undangan->jenis == '0' ? 'selected':'' !!}>Bagian</option>   
                  </select>
             </div>
             <div class="relative mb-4">
                <label for="keterangan" class="leading-7 text-sm text-gray-600">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $undangan->keterangan }}</textarea>
             </div>
              {{-- <div class="relative mb-4">
                  <label for="keterangan" class="leading-7 text-sm text-gray-600">Keterangan</label>
                  <textarea id="keterangan" name="keterangan" value="{{ $undangan->keterangan }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
              </div> --}}
              
              <div class="relative mb-4">
                  <label for="file_undangan" class="leading-7 text-sm text-gray-600">File Undangan</label>
                  <input type="file" id="file_undangan" name="file_undangan" accept="application/pdf,application/vnd.ms-excel" class="w-full bg-white rounded border border-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              
              {{-- <livewire:undangan.undangan-pegawai> --}}
                @livewire('undangan.add-pegawai')
                <button wire:click = "$emitTo('undangan.add-pegawai','onShowPegawaiListener')" type="button" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Pilih Pegawai</button>
                
                @livewire('undangan.undangan-pegawai',['id'=>$undangan->id])
                

              <button type="submit" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
              <button type="reset" class="my-1 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Clear</button>
            
          </div>
            </form>
        </div>
</section>
@endsection