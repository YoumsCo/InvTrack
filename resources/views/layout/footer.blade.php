<div
    class="transition-all duration-400 w-full min-h-25 flex flex-col justify-center items-center bg-black p-5 mt-10 border-t-2 border-white">
    <div class="transition-all duration-400 w-full flex justify-center items-center">
        <a href="{{ route('home') }}" class="transition-all duration-400 w-18 h-18 flex justify-center items-center">
            <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo" class="aspect-video rounded-full w-full h-full">
        </a>
        <div class="transition-all duration-400 w-full flex flex-wrap justify-center items-center gap-5">
            <a href="{{ route('home') }}"
                class="transition-all duration-400 relative sm:text-xl hover:scale-105 active:scale-90 before:transition-all before:duration-400 before:absolute before:bottom-0 before:left-1/2 before:w-0 before:h-[2px] before:bg-white hover:before:left-0 hover:before:w-full after:transition-all after:duration-400 after:absolute after:-bottom-1 after:left-1/2 after:w-0 after:h-[2px] after:bg-white hover:after:left-1/3 hover:after:w-1/2"><i
                    class="fa-solid fa-house-user mr-2"></i>Accueil</a>
            <a href="{{ route('home') }}"
                class="transition-all duration-400 relative sm:text-xl hover:scale-105 active:scale-90 before:transition-all before:duration-400 before:absolute before:bottom-0 before:left-1/2 before:w-0 before:h-[2px] before:bg-white hover:before:left-0 hover:before:w-full after:transition-all after:duration-400 after:absolute after:-bottom-1 after:left-1/2 after:w-0 after:h-[2px] after:bg-white hover:after:left-1/3 hover:after:w-1/2"><i
                    class="fa-solid fa-history mr-2"></i>Historique</a>
            <form action="{{ route('signout') }}" method="POST"
                class="transition-all duration-400 hover:scale-105 active:scale-90 before:transition-all before:duration-400 before:absolute before:bottom-0 before:left-1/2 before:w-0 before:h-[2px] before:bg-red-300 hover:before:left-0 hover:before:w-full after:transition-all after:duration-400 after:absolute after:-bottom-1 after:left-1/2 after:w-0 after:h-[2px] after:bg-red-300 hover:after:left-1/3 hover:after:w-1/2">
                @csrf
                <button type="submit"
                    class="transition-all duration-500 cursor-pointer sm:text-xl hover:text-red-300">
                    <i class="fa fa-sign-out"></i>
                    <span class="sm:inline hidden">Deconnexion</span>
                </button>
            </form>
        </div>
    </div>
    <p class="transition-all duration-400 w-full flex justify-center items-center text-nowrap">
        Copyright &copy;<span class="transition-all duration-300 font-bold mx-2">InvTrack</span> {{ date('Y') }}
        &nbsp; tout droit reservé
    </p>
</div>
