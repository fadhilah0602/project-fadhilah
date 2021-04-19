@extends('layouts.app')
@section('content')

<section class="text-gray-600 body-font relative">
        <div class="container px-5  lg:w-1/2 w-full">
          <div class="md:max-w-32 bg-white flex flex-col md:ml-auto w-full md:py-8  md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Detail Data Bagian</h2>
            <div class="relative mb-4">
                    <div class="flex flex-row w-full">
                        <div class="w-64">
                            <label for="name" class="leading-7 text-md font-bold text-gray-900">Nama</label>  
                    </div>
                    <div>
                            <label for="name" class="leading-7 text-sm text-gray-600">{{ $bagian->name }}</label>
                    </div>
			</div>
          </div>
        </div>
      </section>
      
@endsection



{{-- <html>
<head><title>Lihat Data Bagian</title></head>
<body>
	<h1>Lihat Data Bagian</h1>
	<table>
		<tr>
			<td>Nama</td>
			<td>{{ $bagian->name }}</td>
		</tr>
	</table>
    
</body>
</html> --}}