@extends('layouts.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
@section('content')
<section class="max-w-screen-lg mx-auto items-center">
    <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
        <div>
            <img src="" alt="" class="w-24 h-24 rounded-full bg-slate-200" id="imageUser">
        </div>
            <h3 class="text-3xl font-semibold" id="namaUser">

            </h3>
    </div>
    <div class="flex flex-row justify-between">
        <div class="flex mt-10">
            <div>
                <h3>Nama Lengkap :
                <h3>Alamat Rumah :
                <h3>Tanggal Lahir :
            </div>
            <div>
                <p id="namalengkap"></p>
                <p id="alamat"></p>
                <p id="tanggalLahir"></p>
            </div>

        </div>
        <div>
            <div class="mt-16">
                <a href="/editprofile"><button class="bg-red-600 text-white rounded-full px-3 py-2">Edit Profile</button></a>
            </div>
        </div>
    </div>
    <hr class="bg-black border border-black mt-5">
    <div class="flex gap-5">
        <div><a href="/profilealbum">Album</a></div>
        <div><a href="/profile">Foto</a></div>
    </div>
    <div class="flex gap-3">
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block bi bi-plus text-red-600 text-4xl"></button>
        @if ($message=Session::get('success'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-orange-400 rounded-lg dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ $message }}
            </div>
        </div>
          @endif
         <!-- Main modal -->
         <form action="/tambahalbum" method="POST">
            @csrf
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Buat Album Baru
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama_album" class="block mb-2 text-sm font-medium text-black dark:text-white">Nama</label>
                                <input type="text" name="nama_album" id="nama_album" class="bg-orange-50 border border-orange-300 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="Silahkan isi nama album">
                            </div>
                            <div class="col-span-2">
                                <label for="foto_sampul" class="block mb-2 text-sm font-medium text-black dark:text-white">Nama</label>
                                <input type="file" name="foto_sampul" id="foto_sampul" class="bg-orange-50 border border-orange-300 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full">
                            </div>

                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Tambahkan Album
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </form>
    </div>


    <div class="flex gap-3 flex-wrap p-3">
        @foreach ( $albums as $album )
        <div class="flex flex-wrap gap-3 mt-2 mb-5 py-5 max-w-screen-lg ">
            <div class="flex  gap-3 w-[250px] h-[200px] mt-2">
                        <a href="/isialbum/{{ $album->id }}">
                        <div class="">
                            <div>
                                <img src="{{asset('/asset/'.$album->foto_sampul)}}" alt="" class="">
                            </div>
                            <div>
                                <h1 class="text-red-600 text-center mb-2 "> {{ $album->nama_album }}</h1>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
     </div>
</section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profilesaya.js"></script>
@endpush
