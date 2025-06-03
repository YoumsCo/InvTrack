<div class="transition-all duration-400 relative w-full flex flex-col justify-center items-start">
    <label for="{{ $id }}" class="transition-all duration-400">{{ $label }}</label>
    <input type="{{ $type }}" id={{ $id }} name={{ $name }} placeholder="{{ $placeholder }}"
        value="{{ old($name) ?? $value ?? '' }}" list="{{ $list }}"
        class="transition-all duration-400 w-full h-10 border-b-2 dark:border-white focus:outline-none focus:shadow-sm dark:focus:shadow-white p-2 pr-8 placeholder:text-base dark:placeholder:text-gray-400">
    <span id="{{ $iconId }}"
        class="transition-all duration-400 absolute right-0 top-0 translate-y-[30px] -translate-x-2 cursor-pointer text-xl">
        <i class="{{ $icon }}"></i>
    </span>
    @error($name)
        <span class="transition-all duration-400 w-full text-wrap dark:text-red-500">{{ $message }}</span>
    @enderror
</div>
