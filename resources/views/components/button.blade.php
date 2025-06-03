<button type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" @class([
    'transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] dark:bg-black bg-gray-200 dark:text-white text-black font-extrabold rounded-md cursor-pointer border-b-2 dark:border-white border-black active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 dark:before:border-white before:border-black before:w-0 hover:before:left-0 hover:before:w-full' => !$classList,
    $classList => $classList,
])>
    {{ $content }}
</button>
