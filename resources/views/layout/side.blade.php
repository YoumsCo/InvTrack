@vite(["resources/js/layout/side.js"])

<div id="side-container"
    class="transition-all duration-400 sm:relative fixed top-0 left-0 w-50 h-full flex flex-col justify-center items-center dark:bg-black/60 sm:bg-blue-950 bg-blue-950/60 border-r border-white z-30">
    <div class="transition-all duration-400 w-full h-[20%] flex justify-center items-center border-b border-gray-700 p-2">
        <a href="{{ route('home') }}" id="side-logo" class="w-[150px] h-[90px]">
            <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                class="transition-400 duration-400 w-full h-full rounded-full aspect-video">
        </a>
        <div class="transition-all duration-400 w-full h-full flex flex-col justify-center items-center pr-3">
            <div class="transition-all duration-400 w-full h-1/2 flex justify-end items-start pr-3">
                <span id="close-side" class="transition-all duration-400 text-2xl translate-x-3 cursor-pointer hover:scale-105 active:scale-90">
                    <i class="fa-solid fa-close"></i>
                </span>
            </div>
            <div class="transition-all duration-400 w-full h-1/2 flex justify-end items-end">
                <form action="{{ route("signout") }}" method="POST" class="transition-all duration-400">
                    @csrf
                    <button type="submit"
                        class="transition-all duration-500 hover:text-red-300 active:scale-80 cursor-pointer">
                        <span class="fa fa-sign-out text-xl"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div
        class="transition-all duration-400 w-full h-[70%] flex flex-col justify-start items-center gap-6 p-3 overflow-y-auto">
        <a href="{{ route("home") }}"
            class="transition-all duration-400 w-full min-h-10 border-b-2 border-white flex justify-start items-center gap-3 font-bold px-2 hover:text-black hover:bg-white/90 active:scale-90">
            <i class="fa-solid fa-home"></i>
            <span class="side-link-text">Accueil</span>
        </a>
        <a href="{{ route("responsable.index") }}"
            class="disapear transition-all duration-400 w-full min-h-10 border-b-2 border-white flex justify-start items-center gap-3 font-bold px-2 hover:text-black hover:bg-white/90 active:scale-90">
            <i class="fa-solid fa-user-tie"></i>
            <span class="side-link-text">Responsable</span>
        </a>
        <a href="{{ route("etudiant.index") }}"
            class="transition-all duration-400 w-full min-h-10 border-b-2 border-white flex justify-start items-center gap-3 font-bold px-2 hover:text-black hover:bg-white/90 active:scale-90">
            <i class="fa-solid fa-user-alt"></i>
            <span class="side-link-text">Etudiant</span>
        </a>
        <a href="{{ route("materiel.index") }}"
            class="disapear transition-all duration-400 w-full min-h-10 border-b-2 border-white flex justify-start items-center gap-3 font-bold px-2 hover:text-black hover:bg-white/90 active:scale-90">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span class="side-link-text">Matériel</span>
        </a>
        <a href="{{ route("historique") }}"
            class="transition-all duration-400 w-full min-h-10 border-b-2 border-white flex justify-start items-center gap-3 font-bold px-2 hover:text-black hover:bg-white/90 active:scale-90">
            <i class="fa-solid fa-history"></i>
            <span class="side-link-text">Historique</span>
        </a>
        <span id="theme" href="{{ route("historique") }}"
            class="transition-all duration-400 w-full min-h-10 border-b-2 border-white flex justify-start items-center gap-3 font-bold px-2 cursor-pointer hover:text-black hover:bg-white/90 active:scale-90">
            <i class="fa-solid fa-moon"></i>
            <span class="side-link-text">Sombre</span>
        </span>
    </div>
    <div class="transition-all duration-400 w-full h-[10%] flex flex-col justfy-end items-center gap-3">
        <p id="side-footer-text" class="transition-all duration-400 w-full h-full flex flex-wrap justify-center items-center">
            Copyright &copy;<span class="transition-all duration-300 font-bold mx-2">InvTrack</span> {{ date('Y') }}
            &nbsp; tout droit reservé
        </p>
        <span id="open-side" class="transition-all duration-400 hidden cursor-pointer hover:scale-105 active:scale-90">
            <i class="fa-solid fa-sliders"></i>
        </span>
    </div>
</div>
