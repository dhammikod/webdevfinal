@extends('layouts.maintemp')

@section('title', $title)

@section('content')

    {{-- masthead --}}
    <div class="bg-filled bg-no-repeat bg-bottom pt-32 pb-64 relative" style="height: auto;
    min-height: 34rem;
    padding: 15rem 0;
    background: linear-gradient(to bottom, rgba(56, 56, 56, 0.035) 0%, rgba(0, 0, 0, 0.7) 75%, rgba(0, 0, 0, 0.763) 100%), url('img/catalogmasthead.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;">
        <h1 class="text-white text-4xl font-bold pl-4 underline decoration-orange-600 absolute bottom-0 left-0 h-24">Past Miniatures</h1>
    </div>

    <div class="bg-gradient-to-b from-black via-neutral-900 to-black relative p-4 md:pt-12" style="background-color: #0e0e0e;
    opacity: 1;
    background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #0e0e0e 40px ), repeating-linear-gradient( #00000055, #000000 );">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-8 content-center md:ml-8 md:pt-12">

            @foreach ($products as $pr)
                <x-product-catalog imgsrc="/img/{{ $pr['imgsrc'] }}" :name="$pr['name']"
                :desc="$pr['desc']" :modalId="$pr['modalId']"/>
            @endforeach

        </div>  
    </div>

    @foreach ($products as $pr)
        <x-modal-review :modalId="$pr['modalId']" imgsrc="/img/{{ $pr['imgsrc'] }}" :prodName="$pr['name']">
        @foreach ($pr['reviews'] as $rv)
            <x-chat-review :name="$rv['name']" :reviews="$rv['reviews']" :time="$rv['time']" :score="$rv['score']" />
        @endforeach
        </x-modal-review>   
    @endforeach

@endsection