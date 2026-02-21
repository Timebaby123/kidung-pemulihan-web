<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        <div @click="mobile = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div> 
    </nav>
    <div x-show="mobile"  class="fixed top-0 left-0 h-screen w-64 bg-white shadow-2xl">
        <div class="flex justify-between">
            <div>

            </div>
            <div @click="mobile = !mobile" class="mr-5 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 mt-3.5 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>

            </div>
        </div>
        <p class="mt-3 ml-3">Cari kidung</p>
        <form action="{{ route('Search') }}" method="GET">
            @csrf
        <div class="ml-3   w-32 flex">
            <input name="search" type="text" class="border-b focus:outline-0">
            <button type="submit"><svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-3 size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg></button>

        </div>
        </form>
    </div>
    {{--  --}}
    {{--  --}}
</head>
<body x-data="{ mobile : false }">
    {{-- Mobile isinya --}}
    <div class="sm:hidden">
        @if($method == 0)
            <h4 class="text-center font-bold mt-5">Suplemen No. {{ $data->no_kidung }}</h4>
        @else
            <h4 class="text-center font-bold mt-5">Kidung No. {{ $data->no_kidung }}</h4>
        @endif
        <h4 class="text-center font-bold mt-1">{{ $data->judul }}</h4>
        <div class=" mt-3 ">
            <p class="justify-self-center-safe w-64 pl-4">{!! nl2br(($data->isi)) !!}</p>
        </div>
    </div>

    {{-- Desktop Isinya --}}
    <div class="sm:block hidden pl-5">
        @if($method == 0)
            <h4 class="text-2xl font-bold mt-10">Suplemen No. {{ $data->no_kidung }}</h4>
        @else
            <h4 class="text-2xl font-bold mt-10">Kidung No. {{ $data->no_kidung }}</h4>
        @endif
        <h4 class="text-2xl font-bold mt-1">{{ $data->judul }}</h4>
        <div class="mt-5 ">
            <p class=" text-xl font-semi-bold">{!! nl2br(($data->isi)) !!}</p>
        </div>
    </div>
</body>
</html>