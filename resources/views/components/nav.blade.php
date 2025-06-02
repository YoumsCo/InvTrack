<div
    class="transition-all duration-400 sticky top-0 w-full h-18 border-b-2 border-white flex justify-between items-center sm:px-8 px-5 gap-10 bg-black/85 z-10">
    <a href="{{ route('home') }}" class="transition-all duration-400 w-16 h-16 flex justify-start items-center">
        <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
            class="transition-all duration-400 aspect-video w-full h-full rounded-full">
    </a>
    <div class="transition-all duration-400 sm:w-2/3 w-[80%] h-full flex justify-around items-center sm:gap-5 gap-5">
        <form action="{{ route($action) }}" method="{{ $method }}"
            class="transition-all duration-400 relative md:max-lg:w-2/3 lg:w-1/2 w-full h-full flex justify-center items-center">
            @csrf
            <input type="text" name="search" id="search" placeholder="Rechercher..."
                value="{{ old('search') ?? '' }}"
                class="transition-all duration-400 w-full h-10 border-b-2 border-white focus:outline-none p-2 pr-8 placeholder:text-base placeholder:text-gray-400">
            <input type="hidden" name="action" value="search">
            <input type="hidden" name="page" value="{{ $page }}">
            <button type="submit"
                class="fa fa-search transition-all duration-500 absolute right-0 top-0 translate-y-7 -translate-x-2 hover:scale-110 active:scale-80 cursor-pointer"
                style="font-size: 13pt"></button>
        </form>
        <form action="{{ route('signout') }}" method="POST"
            class="transition-all duration-400 sm:w-1/2 w-[50px] h-full flex justify-center items-center">
            @csrf
            <button type="submit"
                class="transition-all duration-500 hover:text-red-300 active:scale-80 cursor-pointer">
                <span class="fa fa-sign-out" style="font-size: 16pt"></span>
                <span class="sm:inline hidden">Deconnexion</span>
            </button>
        </form>
    </div>
</div>
