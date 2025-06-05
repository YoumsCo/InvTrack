@extends('layout.layout')
@section('title')
    Liste des administrateurs
@endsection
@section('body')
    <x-container>
        @if (session('message'))
            <x-alert :message="session('message')" />
        @endif

        @include('layout.head')

        <x-nav action="admin.index" page="admin_list" />

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex justify-start items-center gap-5 pl-5">
            <x-a :href="route('admin.index')" text="Tout" />
            <x-a :href="route('admin.create')" text="Ajouter un administrateur" />
        </div>

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex flex-col justify-start items-start px-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center">
                <h2
                    class="transition-all duration-400 relative sm:text-3xl text-xl text-center dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] before:bg-white after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] after:bg-white">
                    Liste des administrateurs <span
                        class="transition-all duration-400 dark:text-blue-200 text-blue-950 ml-2 text-xl">({{ count($admins) }})</span>
                </h2>
            </div>

            @forelse ($admins as $adm)
                <div
                    class="transition-all duration-400 relative w-full h-70 flex justify-center items-center rounded-md my-10 p-5 before:tranition-all before:duration-400 before:absolute before:left-0 before:top-0 before:w-5 before:h-5 before:border-l-2 before:border-t-2 dark:before:border-white before:border-blue-950 after:tranition-all after:duration-400 after:absolute after:right-0 after:bottom-0 after:w-5 after:h-5 after:border-r-2 after:border-b-2 dark:after:border-white after:border-blue-950">
                    <div
                        class="transition-all duration-400 sm:w-1/3 w-full h-full flex justify-center items-center rounded-s-md sm:pb-10">
                        <img src="{{ asset((string) 'storage/' . $adm->photo) }}" alt="Image"
                            class="transition-all duration-400 w-full h-full aspect-video object-center rounded-s-md mix-blend-multiply">
                    </div>
                    <div
                        class="transition-all duration-400 sm:static absolute left-0 top-0 sm:w-2/3 w-full h-full flex flex-col justify-center items-start sm:gap-10 gap-2 p-5 sm:bg-transparent dark:bg-black/80 bg-white/80">
                        <div
                            class="transition-all duration-400 w-full h-2/3 flex flex-col justify-center items-start gap-4 px-5">
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-id-card dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Matricule :</span>
                                    <span
                                        class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $adm->matricule }}</span>
                                </span>
                            </p>
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Nom :</span>
                                    <span
                                        class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $adm->nom }}</span>
                                </span>
                            </p>
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-mobile dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Téléphone :</span>
                                    <a href="{{ (string) 'tel:+' . $adm->telephone }}"
                                        class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $adm->telephone }}</a>
                                </span>
                            </p>
                        </div>
                        <div
                            class="transition-all duration-400 w-full h-1/4 flex justify-end items-center gap-5 sm:pr-0 pr-5">
                            <form action="{{ route('admin.destroy', $adm->id) }}" method="POST"
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

        @include('layout.footer')
    </x-container>
@endsection
