<a href="{{ route('offload', ['token' => $name]) }}"
    class="transition-all duration-400 relative sm:w-75 w-85 sm:h-70 h-80 flex flex-wrap justify-start items-start gap-5 rounded-md p-5 before:tranition-all before:duration-400 before:absolute before:left-0 before:top-0 before:w-5 before:h-5 before:border-l-2 before:border-t-2 dark:before:border-white  before:border-blue-950 after:tranition-all after:duration-400 after:absolute after:right-0 after:bottom-0 after:w-5 after:h-5 after:border-r-2 after:border-b-2 dark:after:border-white after:border-blue-950">
    <img src="{{ $image }}" alt="{{ $name }}"
        class="transition-all duration-400 w-full h-4/5 aspect-video object-center rounded-md cursor-pointer hover:scale-110">
    <p class="transition-all duration-400 w-full h-1/5 text-center dark:text-white text-black font-bold">{{ $name }}</p>

    <div class="transition-all duration-400 absolute right-0 -top-5 dark:text-blue-200">
        @if ($indice)
            <span>( {{ $indice }} )</span>
        @endif
    </div>
</a>
