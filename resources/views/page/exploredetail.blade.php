@extends('layouts.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')
<section class="max-w-screen-lg mx-auto mt-10">
    <div class="flex">
        <div class="w-[60%]">
            <div class="flex gap-4 mb-10">
                <div class="w-[50%]">
                    <img src="" alt="" id="fotodetail" name="url">
                </div>
                <div class="w-[50%]">
                    <div class="flex-col">
                      <div class="flex justify-between">
                                <div class="flex">
                                    <img src="" class=" bg-slate-200 w-10 h-10 rounded-full p-2" alt="" id="fotouser">
                                <div class="flex-col">
                                    <div class="text-base font-bold" id="username" name="id_user"></div>
                                    <div class="text-xs">{{$datafoto->created_at->format('d-m-y')}}</div>
                                </div>
                                </div>
                                <div id="drop">
                                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                        </svg>
                                      </button>

                                      <!-- Dropdown menu -->
                                      <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                              <a href="tampilkandata/{{$datafoto->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                              <a href="delete/{{$datafoto->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hapus</a>
                                            </li>
                                          </ul>

                                      </div>
                                </div>
                        </div>
                        <div>
                            <h1 class="font-bold mt-5 mb-3 text-sm text-left">Komentar</h1>
                        </div>
                        @csrf
                        <div class="h-48 w-full overflow-y-scroll" id="listkomentar">
                        </div>


                        <div class="flex gap-1">
                           <div>
                            <input type="text" name="textkomentar" id="" class="rounded-xl border text-md border-red-600 mt-3" placeholder="Tambahkan Komentar">
                            <button class="bg-red-600 text-white px-5 rounded-xl" onclick="kirimkomentar()">
                                <span class="bi bi-send-fill"></span>
                            </button>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="text-3xl" id="judulfoto" name="judul_foto">Ayam Bakar</div>
                <div class="text-sm mt-2" id="deskripsifoto" name="deskripsi_foto"></div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/exploredetail.js"></script>
@endpush

