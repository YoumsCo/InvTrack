@extends('layout.layout')
@section('title')
    Liste des responsables
@endsection
@section('css_js')
    @vite(['resources/js/materiel/list.js'])
@endsection
@section('body')
    <x-container>
        @if (session('message'))
            <x-alert :message="session('message')" />
        @endif

        @include('layout.head')

        <x-nav action="materiel.index" page="materiel_list" />

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex justify-start items-center gap-5 pl-5">
            <x-a :href="route('materiel.create')" text="Ajouter un matériel" />
        </div>

        <div
            class="transition-all duration-400 sticky top-18 left-0 w-[98%] flex flex-col justify-center items-start gap-3 dark:bg-black/80 bg-white/80 z-5 px-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center gap-5">
                <span class="mr-2 sm:text-xl text-base text-nowrap dark:text-white text-black"><i
                        class="fa-solid fa-filter mr-5"></i>Filtre /
                    matériel
                    : ...</span>
                <div id="filterContainer"
                    class="transition-all duration-400 w-full flex justify-start items-center pl-5 sm:pl-0 sm:gap-3 gap-10 overflow-hidden pr-5">
                    <a href="{{ route('materiel.index') }}"
                        class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] dark:bg-black bg-gray-200 dark:text-white text-black font-extrabold rounded-md cursor-pointer border-b-2 dark:border-white border-black aspect-video active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 dark:before:border-white before:border-black before:w-0 hover:before:left-0 hover:before:w-full">Tout</a>
                    @foreach ($filter as $value)
                        <form action="{{ route('materiel.index') }}" method="GET"
                            class="transition-all duration-400 flex justify-center items-center">
                            @csrf
                            <input type="hidden" name="search" value="{{ $value }}">
                            <input type="hidden" name="action" value="filter">
                            <input type="hidden" name="page" value="list">
                            <button type="submit"
                                class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] dark:bg-black bg-gray-200 dark:text-white text-black font-extrabold rounded-md cursor-pointer border-b-2 dark:border-white border-black active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 dark:before:border-white before:border-black before:w-0 hover:before:left-0 hover:before:w-full">
                                {{ $value }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
            <div class="transition-all duration-400 w-full hidden max-[600px]:flex justify-center items-center gap-7">
                <i id="filter-left"
                    class="fa fa-chevron-left transition-all duration-400 dark:text-white text-black hover:scale-105 active:scale-85 cursor-pointer"
                    style="font-size: 17pt;"></i>
                <i id="filter-right"
                    class="fa fa-chevron-right transition-all duration-400 dark:text-white text-black hover:scale-105 active:scale-85 cursor-pointer"
                    style="font-size: 17pt;"></i>
            </div>
        </div>

        @if ($paginate == true)
            {{ $materiels->links() }}
        @endif

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex flex-col justify-start items-start px-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center">
                <h2
                    class="transition-all duration-400 relative sm:text-3xl text-xl text-center dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] dark:before:bg-white before:bg-blue-950 after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] dark:after:bg-white after:bg-blue-950">
                    Liste des matériels <span
                        class="transition-all duration-400 dark:text-blue-200 text-blue-900 ml-2 text-xl">({{ count($materiels) }})</span>
                </h2>
            </div>


            @forelse ($materiels as $mat)
                <div
                    class="transition-all duration-400 relative w-full sm:h-60 h-80 flex justify-center items-center rounded-md my-10 p-5 dark:bg-transparent bg-black/10 before:tranition-all before:duration-400 before:absolute before:left-0 before:top-0 before:w-5 before:h-5 before:border-l-2 before:border-t-2 dark:before:border-white before:border-blue-950 after:tranition-all after:duration-400 after:absolute after:right-0 after:bottom-0 after:w-5 after:h-5 after:border-r-2 after:border-b-2 dark:after:border-white after:border-blue-950">
                    <div class="transition-all duration-400 sm:w-1/3 w-full h-full rounded-s-md">
                        <img src="{{ asset((string) 'storage/' . $mat->image) }}" alt="Image"
                            class="transition-all duration-400 w-full h-full aspect-video object-center rounded-s-md mix-blend-multiply">
                    </div>
                    <div
                        class="transition-all duration-400 sm:static absolute left-0 top-0 sm:w-2/3 w-full h-full flex flex-col justify-center items-start sm:gap-10 gap-2 p-5 sm:bg-transparent dark:bg-black/80 bg-white/80">
                        <div
                            class="transition-all duration-400 w-full h-5/6 flex flex-col justify-center items-start gap-4">
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Nom :</span>
                                    <span
                                        class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $mat->libelle }}</span>
                                </span>
                            </p>
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-mobile dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Catégorie :</span>
                                    <span
                                        class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $mat->categorie }}</span>
                                </span>
                            </p>
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Etat :</span>
                                    <span
                                        class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $mat->etat }}</span>
                                </span>
                            </p>
                        </div>
                        <div
                            class="transition-all duration-400 w-full h-1/6 flex justify-end items-center gap-5 sm:pr-0 pr-5">
                            <form action="{{ route('materiel.update', $mat) }}" method="POST"
                                class="transition-all duration-400 text-xl text-emerald-500 cursor-pointer hover:scale-105 active:scale-90">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="etat" value="Disponible">
                                <button type="submit" class="fa-solid fa-check cursor-pointer"></button>
                            </form>

                            <form action="{{ route('materiel.update', $mat) }}" method="POST"
                                class="transition-all duration-400 text-xl text-yellow-400 cursor-pointer hover:scale-105 active:scale-90">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="etat" value="En maintenance">
                                <button type="submit" class="fa-solid fa-hammer cursor-pointer"></button>
                            </form>

                            <form action="{{ route('materiel.update', $mat) }}" method="POST"
                                class="transition-all duration-400 text-xl text-red-800 cursor-pointer hover:scale-105 active:scale-90">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="etat" value="Defectueux">
                                <button type="submit" class="fa-solid fa-ban cursor-pointer"></button>
                            </form>

                            <form action="{{ route('materiel.destroy', $mat) }}" method="POST"
                                class="transition-all duration-400 text-red-500 text-xl cursor-pointer hover:scale-105 active:scale-90">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa-solid fa-trash-alt cursor-pointer"></button>
                            </form>

                        </div>
                    </div>
                </div>
            @empty
                <span class="transition-all duration-400 text-xl animate-pulse my-10">Aucun resultat 😥</span>
            @endforelse
        </div>

        @if ($paginate == true)
            {{ $materiels->links() }}
        @endif

        @include('layout.footer')
    </x-container>
@endsection
