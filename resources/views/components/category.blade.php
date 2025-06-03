<div class="transition-all duration-400 relative w-full flex flex-col justify-start items-start gap-10">
    <h2
        class="transition-all duration-400 relative sm:text-2xl text-xl dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] dark:before:bg-white before:bg-blue-950 after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] dark:after:bg-white after:bg-blue-950">
        <i class="{{ (string) "fa-solid fa-$icon mr-1" }}"></i>
        {{ $name }}
        &nbsp;
        <span class="transition-all duration-400 sm:text-xl text-base dark:text-blue-200">({{ $count }})</span>
    </h2>
    <div class="transition-all duration-400 w-full flex flex-wrap sm:justify-start justify-center items-start gap-20">
        {{ $slot }}
    </div>
</div>
