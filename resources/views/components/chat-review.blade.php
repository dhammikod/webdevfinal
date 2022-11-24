<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
    <p class="text-sm text-purple">
        {{ $name }}
    </p>
    <p class="text-sm mt-1">
        {{ $reviews }}
    </p>
    <p class="text-right text-xs text-grey-dark mt-1">
        {{ $time }}
    </p>
</div>
<div class="flex mt-2 mb-4">
    <div class="flex items-center">
        @for ($i = 0; $i < 5; $i++)
            @if ($i < floor($score))
                <x-filled-star />
            @else
                <x-empty-star />
            @endif
        @endfor
    </div>
    <p class="ml-1 md:ml-2 text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-400">{{ $score }} out of 5</p>
</div>