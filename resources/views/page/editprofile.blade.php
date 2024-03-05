@extends('layouts.master')
@section('content')
    <section class="mt-32">

    </section>
    <section class="max-w-screen-md mx-auto ">
        <form action="/updateprofile/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="flex flex-wrap justify-between flex-container">
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                <!-- Photo File Input -->
                <input type="file" name="picture" class="hidden" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                ">

                <label class="block text-red-700 text-sm font-bold mb-2 text-center" for="picture">
                    <span class="text-red-600"> </span>
                </label>

                <div class="text-center">
                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{asset('asset/'.$data->picture)}}" class="w-40 h-40 m-auto rounded-full shadow">
                    </div>
                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block w-40 h-40 rounded-full m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                        </span>
                    </div>
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-red-300 rounded-md font-semibold text-xs text-red-700 uppercase tracking-widest shadow-sm hover:text-red-500 focus:outline-none focus:border-red-400 focus:shadow-outline-blue active:text-red-600 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                        Edit
                    </button>
                </div>
            </div>
            <div class="w-3/5 max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-4 py-4 ">
                        <h5 class="text-3xl text-center text-red-600">Your Profile</h5>

                        <h5>Email</h5>
                        <input type="text" class="py-1 rounded-md" name="email" value="{{ $data->email }}">
                        <h5>Username</h5>
                        <input type="text" class="py-1 rounded-md" name="username" value="{{ $data->username }}">
                        <h5>Nama Lengkap</h5>
                        <input type="text" class="py-1 rounded-md" name="nama_lengkap" value="{{ $data->nama_lengkap }}">
                        <h5>Alamat</h5>
                        <input type="text" class="py-1 rounded-md" name="alamat" value="{{ $data->alamat }}">
                        <h5>Tanggal lahir</h5>
                        <input type="date" class="py-1 rounded-md" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                        <button type="submit" class="py-2 mt-4 text-white rounded-md bg-red-600">Perbaharui</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

