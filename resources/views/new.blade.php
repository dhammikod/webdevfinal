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
        <h1 class="text-white text-4xl font-bold pl-4 underline decoration-orange-600 absolute bottom-0 left-0 h-24">What's New</h1>
    </div>

    <div class="bg-gradient-to-b from-black via-neutral-900 to-black text-white p-4 overflow-visible" style="background-color: #0e0e0e;
    opacity: 1;
    background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #0e0e0e 40px ), repeating-linear-gradient( #00000055, #000000 );">

        <h1 class="text-center text-3xl md:text-5xl font-semibold my-4">Want a miniature of your own?</h1>
        <div class="flex flex-col-reverse md:flex-row m-8 pb-8  lg:mx-48">
            <div class="ml-6">
                <p class="my-6 mr-6 text-center md:text-left text-base md:text-lg">Primitive Garage menyediakan request custom miniatur order. Order custom bersertakan detailnya dapat disampaikan melalui media Whatsapp, harga serta waktu pengerjaan sangat bergatung pada order sendiri.</p>
                <p class="my-6 mr-6 text-center md:text-left text-base md:text-lg">Selain melalui request, Primitive Garage akan juga memiliki stok barang terbaru produksi yang diperjualkan. Di bawah ini merupakan produk terbaru kami.</p>
            </div>
        </div>

        <div class="py-16 max-[400px]:py-8">
            @foreach ($new_products as $np)
                <div class="m-8">
                    <div class="grid md:grid-cols-5 md:h-72 md:grid-rows-none grid-rows-2">
                        <div class="m-8 md:col-span-2">
                            <h1 class="text-center md:text-left text-3xl md:text-5xl">{{ $np['name'] }}</h1>
                            <h5 class="text-center md:text-left text-base md:text-xl mt-6 pb-5">{{ $np['desc'] }}</h5>
                        </div>
                        <div class="md:col-span-3 flex justify-end z-1">
                            <img class="object-cover" src="/img/{{ $np['img1'] }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="m-8">
                    <div class="grid grid-cols-5 md:h-72">
                        <div class="hidden col-span-3 md:flex justify-start ml-8 z-0">
                            <img class="object-cover" src="/img/{{ $np['img2'] }}" alt="">
                        </div>
                        <div class="m-8 col-span-5 md:col-span-2 flex items-center">
                            <div class="ml-6 lg:flex-col justify-center items-center w-max">
                                <h1 class="text-4xl text-center pb-5">Order Now</h1>
                                <a href="https://wa.me/6281297656789">
                                    <div class="bg-orange-400 rounded-lg font-semibold text-white text-center text-lg px-3 py-2">Contact WA</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
  
@endsection