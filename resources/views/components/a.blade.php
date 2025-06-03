<a href="{{ $href }}" @class([
    'transition-all duration-500 relative flex justify-center items-center min-w-[150px] h-[40px] dark:bg-black bg-gray-200 dark:text-white text-black font-bold rounded-md cursor-pointer text-nowrap border-b-2 dark:border-white border-black px-2 active:scale-90 hover:scale-105 hover:shadow-md dark:hover:shadow-white dark:hover:shadow-black before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 dark:before:border-white before:border-black before:w-0 hover:before:left-0 hover:before:w-full' => !$classList,
    $classList => $classList,
])>{{ $text }}</a>
