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
    <form action="{{ route('GetKidung') }}" method="GET">
        @csrf
   <div class="text-center pt-10 ">
        <p class="text-xl font-bold">Kidung Pemulihan</p>
        <div class="pt-5">
            <input type="text" name="search"  class="border-b text-center focus:outline-0" placeholder="Nomor Kidung">
            
        </div>
        <div class="flex justify-center mt-5">
        <div class="">
            <button type="submit" class="bg-indigo-500 px-6 py-1 text-white font-semibold rounded-4xl" name="kidung" value="1">Kidung</button>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 ml-3 px-4 py-1 text-white font-semibold rounded-4xl" name="suplemen" value="1">Suplemen</button>
        </div>
        </div>
   </div>
   </form>
</body>
</html>