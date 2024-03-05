@extends('layouts.master')
@section('content')

<section class="max-w-screen-lg mx-auto items-center mt-16">
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
    <form action="/updatedata/{{ $datafoto->id }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="flex gap-4">
        <div class="flex w-[50%]">
            <div class="flex w-[500px] h-[350px] bg-slate-300 mb-20 rounded-3xl justify-center">

                <div class="flex items-center justify-center w-full">
                    <label for="url" class="flex flex-col items-center justify-center w-[500px] h-[350px] border-2 border-orange-400 rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-orange-700 hover:bg-orange-100 dark:border-orange-600 dark:hover:border-orange-500 dark:hover:bg-orange-400">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <img src="{{ asset ('asset/' .$datafoto->url) }}">

                            </div>
                        <input id="url" name="url"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="flex w-[50%]">
            <div class="flex flex-col">
                    <label for="judul_foto">Judul</label>
                    <input type="text" class="border border-red-600 px-16 py-2 rounded-2xl mt-2 mb-5" name="judul_foto" id="judul_foto" value="{{ $datafoto->judul_foto }}">
                    <label for="deskripsi_foto">Deskripsi</label>
                    <input type="text" class="border border-red-600 px-16 py-8 rounded-2xl mt-2 mb-5" name="deskripsi_foto" id="deskripsi_foto" value="{{ $datafoto->deskripsi_foto }}">
                    <label for="album">Album</label>
                    <div class="flex flex-col gap-2 mt-2">
                        <select class=" rounded-xl border border-red-600 px-16 py-2" name="album">
                            @foreach ( $albums as $data )
                        <option value="{{ $data->id }}">{{$data->nama_album}}</option>
                        @endforeach
                    </select>

                        <button class="bg-red-600 py-2 px-3 rounded-xl text-white" type="submit">Edit</button>
                    </div>
            </div>
        </div>
    </div>
</form>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@endsection
