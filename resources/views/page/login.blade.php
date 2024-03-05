<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/tailwind.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <title>login</title>
</head>
<body>

    <div class="flex justify-center items-center mt-20">
      <div class="bg-white shadow-md max-w-screen-sm w-1/4 mx-auto mt-10 p-12 rounded-3xl">

        <h1 class="text-5xl text-bold text-center text-red-600 mb-5">Login</h1>
        @if ($message=Session::get('error'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-red-600 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ $message }}
            </div>
              <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-600 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-red-800 dark:text-red-400 dark:hover:bg-red-700" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
          </div>
          @endif
          <form action="/auth" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label class="mt-5">Email</label>
            <input class="border border-gray-300 rounded-3xl py-3" type="text" name="email">
            @error('email')
            <small class="italic text-red-600">{{ $message }}</small>
            @enderror

        </div>
        <div class="flex flex-col mb-4">
            <label>Password</label>
            <input class="border border-gray-300 rounded-3xl py-3" type="password" name="password">
            @error('password')
            <small class="italic text-red-600">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex flex-col mb-4">
            <button type="submit" class="bg-red-600 text-white rounded-3xl mt-5 py-3 font-bold">Login</button>
        </form>
           <a href="/register"><p class="text-center mt-3">Belum Punya Akun Klik di Sini</p></a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
