@extends('layouts.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
@section('content')
<section class="max-w-screen-lg mx-auto items-center">
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
    @csrf
    <div class="flex flex-wrap gap-5" id="exploredata">

    </div>
</section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
@endpush

