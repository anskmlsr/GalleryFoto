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
            @if ($message=Session::get('success'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-orange-400 rounded-lg bg-red-50 dark:bg-orange-400 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="text-sm font-medium ms-3">
                {{ $message }}
                </div>
                  <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-orange-400 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-orange-800 dark:text-orange-400 dark:hover:bg-orange-700" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
              </div>
            @endif
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
    @csrf
    <div class="flex gap-5" id="exploredatasaya">

    </div>
</section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profilesaya.js"></script>
@endpush
