<div class="transition-all duration-400 relative w-full flex flex-col justify-center items-start">
    <label for="{{ $id }}" class="transition-all duration-400 dark:text-white text-black font-bold">{{ $label }}</label>
    <input type="{{ $type }}" id={{ $id }} name={{ $name }} placeholder="{{ $placeholder }}"
        value="{{ old($name) ?? $value ?? '' }}" list="{{ $list }}"
        class="transition-all duration-400 w-full h-10 border-b-2 dark:border-white border-black dark:text-white text-black font-semibold focus:outline-none focus:shadow-sm dark:focus:shadow-white focus:shadow-black p-2 pr-8 placeholder:text-base dark:placeholder:text-gray-400 placeholder:text-gray-600">
    <span id="{{ $iconId }}"
        class="transition-all duration-400 absolute right-0 top-0 translate-y-[30px] -translate-x-2 cursor-pointer text-xl dark:text-white text-blue-950">
        <i class="{{ $icon }}"></i>
    </span>
    @error($name)
        <span class="transition-all duration-400 w-full text-wrap text-red-500">{{ $message }}</span>
    @enderror
</div>
