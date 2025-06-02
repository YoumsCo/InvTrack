<div id="container" @class([
    '@container transition-all duration-400 w-full h-full flex flex-col gap-5 overflow-y-auto',
    'justify-start items-center' => $centerX && !$centerY && !$centerZ,
    'justify-center items-start' => !$centerX && $centerY && !$centerZ,
    'justify-center items-center' => !$centerX && !$centerY && $centerZ,
    'justify-start items-start' => !$centerX && !$centerY && !$centerZ,
])>
    {{ $slot }}
</div>
