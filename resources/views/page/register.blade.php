<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/tailwind.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <title>register</title>
</head>
<body>
    <nav>
    <div class="flex justify-center items-center mt-20">
      <div class="bg-white shadow-md max-w-screen-sm w-1/4 mx-auto mt-10 px-12 p-3  rounded-3xl">
        <h1 class="text-4xl text-bold text-center text-orange-400">Registrasi</h1>
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
    <form action="registered" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col mb-2">
            <label class="mt-3">Email</label>
            <input class="border border-gray-300 rounded-3xl py-1" type="text" name="email"/>
            @error('email')
            <small class="italic text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-2">
            <label class="mt-1">Username</label>
            <input class="border border-gray-300 rounded-3xl py-1" type="text" name="username"/>
            @error('username')
            <small class="italic text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-2">
            <label class="mt-1">Nama Lengkap</label>
            <input class="border border-gray-300 rounded-3xl py-1" type="text" name="nama_lengkap"/>

        </div>
        <div class="flex flex-col mb-2">
            <label class="mt-1">Alamat</label>
            <input class="border border-gray-300 rounded-3xl py-1" type="text" name="alamat"/>

        </div>
        <div class="flex flex-col mb-2">
            <label>Password</label>
            <input class="border border-gray-300 rounded-3xl py-1" type="password" name="password"/>
            @error('password')
            <small class="italic text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="flex flex-col mb-1">
            <label>Upload file</label>
            <input  class="block w-full text-sm text-gray-400 border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:border-gray-600 dark:placeholder-gray-400" type="file" name="picture">

        </div>
        <div class="flex flex-col mb-1">
            <label>Tanggal Lahir</label>
            <input class=" text-gray-400 border border-gray-300 rounded-3xl py-1" type="date" name="tanggal_lahir"/>
        </div>
        <div class="flex flex-col mb-4">
            <button type="submit" class="bg-orange-400 text-white rounded-3xl mt-5 py-2 font-bold">Register</button>
            </form>
            <a href="/login"><p class="text-center mt-3">Sudah Punya Akun Klik di Sini</p></a>
        </div>
      </div>
    </div>
    </nav>
</body>
</html>
