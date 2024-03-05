@extends('layouts.master')
@section('content')

<section class="max-w-screen-lg mx-auto items-center mt-16">
    <form action="/savefoto" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="flex gap-4">
        <div class="flex w-[50%]">
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3 w-[500px] h-[350px]">
                <!-- Photo File Input -->
                <input type="file" name="url" class="hidden" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                ">

                <label class="block text-red-600 text-sm font-bold mb-2 text-center" for="photo">
                    <span class="text-red-600"> </span>
                </label>

                <div class="text-center">
                    <!-- Current Profile Photo -->
                    <div class="mt-2 border border-red-500 rounded-2xl" x-show="! photoPreview">
                        <img class="bg-red-100 w-[500px] h-[350px] m-auto rounded-2xl shadow-red-500">
                    </div>
                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block w-[500px] h-[350px] rounded-2xl m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                        </span>
                    </div>
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-red-600 rounded-md font-semibold text-xs text-red-700 uppercase tracking-widest shadow-sm hover:text-res-500 focus:outline-none focus:border-red-400 focus:shadow-outline-blue active:text-red-800 active:bg-red-500 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                        Pilih Foto
                    </button>
                </div>
            </div>
        </div>
        <div class="flex w-[50%]">
            <div class="flex flex-col">
                    <label for="judul_foto">Judul</label>
                    <input type="text" class="border border-red-600 px-16 py-2 rounded-2xl mt-2 mb-5" name="judul_foto" id="judul_foto">
                    <label for="deskripsi_foto">Deskripsi</label>
                    <input type="text" class="border border-red-600 px-16 py-8 rounded-2xl mt-2 mb-5" name="deskripsi_foto" id="deskripsi_foto">
                    <label for="album">Album</label>
                    <div class="flex flex-col gap-2 mt-2">
                        <select class=" rounded-xl border border-red-600 px-16 py-2" name="album">
                            @foreach ( $albums as $data )
                        <option value="{{ $data->id }}">{{$data->nama_album}}</option>
                        @endforeach
                    </select>

                        <button class="bg-red-600 py-2 px-3 rounded-xl text-white" type="submit">Upload</button>
                    </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection
