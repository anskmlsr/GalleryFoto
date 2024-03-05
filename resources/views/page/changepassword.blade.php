@extends('layouts.master')
@section('content')
    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h5 class="text-3xl text-center text-red-600 mb-5">Change Your Password</h5>
        </div>
    </section>
    <section class="max-w-[500px] mx-auto ">
        @if (session()->has('success'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-orange-400 rounded-lg bg-red-50 dark:bg-orange-400 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ session('success') }}
            </div>

          </div>
          @endif
          @if (session()->has('error'))
          <div id="alert-1" class=" mx-auto items-center flex items-center p-4 mb-4 text-red-600 rounded-lg dark:text-red-400" role="alert">
              <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div class="text-sm font-medium ms-3">
                  {{ session('error') }}
              </div>

            </div>
            @endif
        <form action="/ubahpassword" method="POST">
            @csrf
            <div class="max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-4 py-4 ">
                        <h5>Old Password</h5>
                        <input type="password" class="py-1 rounded-md" name="password">
                        @error('password')
                        <small class="italic text-red-600">{{ $message }}</small>
                        @enderror
                        <h5>New Password</h5>
                        <input type="password" class="py-1 rounded-md" name="new_password">
                        @error('new_password')
                        <small class="italic text-red-600">{{ $message }}</small>
                        @enderror
                        <h5>Confirm Password</h5>
                        <input type="password" class="py-1 rounded-md" name="confirm_password">
                        @error('confirm_password')
                        <small class="italic text-red-600">{{ $message }}</small>
                        @enderror
                        <button type="submit" class="py-2 mt-4 text-white rounded-md bg-red-600">Perbaharui</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
    @endsection
