<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @php
    $isProduction = app()->environment('production');
    $manifestPath = $isProduction ? '../public_html/build/manifest.json' : public_path('build/manifest.json');
 @endphp
 
  @if ($isProduction && file_exists($manifestPath))
   @php
    $manifest = json_decode(file_get_contents($manifestPath), true);
   @endphp
    <link rel="stylesheet" href="{{ config('app.url') }}/build/{{ $manifest['resources/css/app.css']['file'] }}">
    <script type="module" src="{{ config('app.url') }}/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
  @else
    @viteReactRefresh
    @vite(['resources/js/app.js', 'resources/css/app.css'])
  @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Kidung</title>
    {{-- Desktop Navbar --}}
    <nav class="hidden sm:flex justify-between items-center justify-items-center shadow-xs">
        <div>
            <a href="/">
                <h4 class="sm:text-2xl sm:p-5 font-bold">Kidung Pemulihan</h4>
            </a>
        </div>
        <form action="{{ route('Search') }}" method="GET">
            @csrf
            <div class="sm:w-64 hidden sm:flex">
                <input name="search" type="text" class="border-b focus:outline-0">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="ml-3 size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg></button>

            </div>
        </form>
    </nav>
    {{-- Mobile --}}
    <nav class="sm:hidden flex justify-between items-center justify-items-center shadow-2xs">
        <div>
            <a href="/">
                <h4 class="text-xl p-3 font-bold">Kidung Pemulihan</h4>
            </a>
        </div>
        <div @click="mobile = true ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-7 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
    </nav>
    <div x-show="mobile" x-transition class="fixed top-0 left-0 h-screen w-64 bg-white shadow-2xl">
        <div class="flex justify-between">
            <div>

            </div>
            <div @click="mobile = !mobile" class="mr-5 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-7 mt-3.5 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>

            </div>
        </div>
        <p class="mt-3 ml-3">Cari kidung</p>
        <form action="{{ route('Search') }}" method="GET">
            @csrf
            <div class="ml-3 flex">
                <input name="search" type="text" class="border-b focus:outline-0 w-40">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="ml-1 size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg></button>

            </div>
        </form>
    </div>
    {{-- --}}
</head>

<body x-data="{mobile : false}">
    {{-- Mobile isinya --}}
    <div class="sm:hidden">

        @foreach($data_kidung as $single_data)
            <a href="kidung/{{ $single_data->id}}">
                <div>
                    <h4 class="text-center font-bold mt-5">Kidung No. {{ $single_data->no_kidung }}</h4>
                    <p class="text-center">{{ $single_data->judul }}</p>
                    <p class="text-center">{!! $single_data->isi !!}</p>
                </div>
            </a>
        @endforeach

        @foreach($data_suplemen as $single_datas)
            <a href="suplemen/{{ $single_datas->no_kidung}}">
                <div>
                    <h4 class="text-center font-bold mt-5">Suplemen No. {{ $single_datas->no_kidung }}</h4>
                    <p class="text-center">{{ $single_datas->judul }}</p>
                    <p class="text-center">{!! $single_datas->isi !!}</p>
                </div>
            </a>
        @endforeach
        @if(count($data_kidung) == 0 && count($data_suplemen) == 0)

            <div class="text-center mt-50  font-bold">
                <p class="text-4xl">404</p>
                <p class="text-2xl pt-3">Kidung atau Suplemen tidak ditemukan</p>
            </div>
            <div class="text-center pt-5">
                <a href="/" class="mt-3 text-blue-500">Kembali ke Halaman Utama</a>
            </div>
        @endif
    </div>
    {{-- Desktop Isinya --}}
    <div class="sm:block hidden pl-5">
        @foreach($data_kidung as $single_data)
            <a href="/kidung/{{ $single_data->no_kidung }}">
                <div>
                    <h4 class="font-bold mt-10">Kidung No. {{ $single_data->no_kidung }}</h4>

                    <p class="">{{ $single_data->judul }}</p>

                    <p>{!! $single_data->isi !!}</p>
                </div>
            </a>
        @endforeach

        @foreach($data_suplemen as $single_data)
            <a href="/suplemen/{{ $single_data->no_kidung }}">
                <div>
                    <h4 class="font-bold mt-10">Suplemen No. {{ $single_data->no_kidung }}</h4>

                    <p class="">{{ $single_data->judul }}</p>

                    <p>{!! $single_data->isi !!}</p>
                </div>
            </a>
        @endforeach

        @if(count($data_kidung) == 0 && count($data_suplemen) == 0)

            <div class="text-center mt-50  font-bold">
                <p class="text-4xl">404</p>
                <p class="text-2xl pt-3">Kidung atau Suplemen tidak ditemukan</p>
            </div>
            <div class="text-center pt-5">
                <a href="/" class="mt-3 text-blue-500">Kembali ke Halaman Utama</a>
            </div>
        @endif
    </div>
</body>
<style>
    mark {
        background-color: #ffeb3b;
        padding: 2px 4px;
        border-radius: 4px;
    }
</style>

</html>