<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    {{-- Desktop Navbar  --}}
    <nav class="hidden sm:flex justify-between items-center justify-items-center shadow-xs">
        <div>
              <h4 class="sm:text-2xl sm:p-5 font-bold">Kidung Pemulihan</h4>  
        </div>
        <form action="{{ route('Search') }}" method="GET">
            @csrf
        <div class="sm:w-64 hidden sm:flex">
            <input name="search" type="text" class="border-b focus:outline-0">
            <button type="submit"><svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-3 size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg></button>

        </div>
        </form>
    </nav>
    {{-- Mobile --}}
    <nav class="sm:hidden flex justify-between items-center justify-items-center shadow-2xs">
        <div>
            <h4 class="text-xl p-3 font-bold">Kidung Pemulihan</h4> 
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div> 
    </nav>
    {{--  --}}
</head>
<body>
    {{-- Mobile isinya --}}
    <div class="sm:hidden">
        @foreach($data as $single_data)
            <h4 class="text-center font-bold mt-5">Kidung No. {{ $single_data->no_kidung }}</h4>
            <p class="text-center">{{ $single_data->judul }}</p>
        @endforeach
       
        
    </div>
    {{-- Desktop Isinya --}}
    <div class="sm:block hidden pl-5">
        @foreach($data as $single_data)
        <a href="/kidung/{{ $single_data->no_kidung }}"><div>
            <h4 class="font-bold mt-10">Kidung No. {{ $single_data->no_kidung }}</h4>
            <p class="">{{ $single_data->judul }}</p>
        </div></a>
        @endforeach
    </div>
</body>
</html>