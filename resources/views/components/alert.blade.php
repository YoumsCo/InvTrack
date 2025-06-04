@vite(["resources/js/components/alert.js"])

<div id="alert" class="transition-all duration-400 sticky left-0 top-0 w-full h-[100px] flex justify-center items-center z-100 dark:bg-black/90">
    <div
        class="transition-all duration-400 min-w-50 max-w-11/12 h-full border-2 border-white flex justify-start items-center animate-[pulse_1s_4_linear] py-2 rounded-b-xl dark:bg-transparent bg-blue-950 px-2">
        <span class="transition-all duration-400 w-[10%] h-full flex justify-center items-center text-xl">
            <i class="fa-solid fa-info-circle"></i>
        </span>
        <span class="transition-all duration-400 w-[80%] h-full flex justify-center items-center overflow-auto overscroll-none text-center px-2">{{ $message }}</span>
        <span id="close" class="transition-all duration-400 w-[10%] h-full flex justify-center items-center text-xl cursor-pointer hover:scale-105 active:scale-90">
            <i class="fa-solid fa-close"></i>
        </span>
    </div>
</div>
