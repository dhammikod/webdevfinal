<div data-aos="fade-up" class="max-w-sm h-112 max-[400px]:h-96">
    <a href="#">
        <img class="rounded-t-lg" src={{ $imgsrc }} alt="">
    </a>
    <div class="pt-3 pl-2 content-start h-max">
        <hr class="my-1 mr-2 w-auto h-1 bg-orange-400 rounded border-0 md:my-2">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $name }}</h5>
        </a>
        <p class="pt-4 font-normal text-white">{{ $desc }}</p>
        <div class="absolute bottom-0 left-0 right-0">
            <button class="text-white w-full bg-gradient-to-br from-orange-500 to-orange-400 hover:bg-gradient-to-bl hover:from-orange-400 hover:to-orange-300 focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="button" data-modal-toggle={{ $modalId }}>
                Reviews
            </button>
        </div>
    </div>
</div>