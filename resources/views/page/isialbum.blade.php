@extends('layouts.master')
@section('content')
@foreach ($fotos as $foto )
`<div class="flex w-1/5 border border-orange-500 mt-10">
    <div class="flex flex-col">
    <div class="overflow-hidden">
        <a href="/exploredetail/{{$foto->id}}"><img src="{{asset('/asset/'.$foto->url)}}" alt=""></a>
    </div>
    <div class="flex justify-between items-center">
        <div class="font-bold">{{$foto->judul_foto}}</div>
        <div class="flex flex-col p-1">
            <div>
                <h1 class="text-sm">{{$foto->created_at->format('d-m-y')}}</h1>

            </div>


        </div>
    </div>
</div>
    </div>`
    @endforeach
@endsection
