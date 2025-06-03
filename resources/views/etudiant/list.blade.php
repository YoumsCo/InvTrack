@extends('layout.layout')
@section('title')
    Liste des étudiants
@endsection
@section('body')
    <x-container>
        @if (session('message'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        @include('layout.head')

        <x-nav action="etudiant.index" page="etudiant_list" />

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex justify-start items-center gap-5 pl-5">
            <x-a :href="route('etudiant.index')" text="Tout" />
            <x-a :href="route('etudiant.create')" text="Ajouter un étudiant" />
        </div>

        {{ $etudiants->links() }}

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex flex-col justify-start items-start px-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center">
                <h2
                    class="transition-all duration-400 relative sm:text-3xl text-xl text-center dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] before:bg-white after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] after:bg-white">
                    Liste des étudiants <span
                        class="transition-all duration-400 dark:text-blue-200 text-blue-950 ml-2 text-xl">({{ count($etudiants) }})</span>
                </h2>
            </div>


            @forelse ($etudiants as $etd)
                <div
                    class="transition-all duration-400 relative w-full sm:h-120 h-150 flex justify-center items-center rounded-md my-10 p-5 before:tranition-all before:duration-400 before:absolute before:left-0 before:top-0 before:w-5 before:h-5 before:border-l-2 before:border-t-2 dark:before:border-white before:border-blue-950 after:tranition-all after:duration-400 after:absolute after:right-0 after:bottom-0 after:w-5 after:h-5 after:border-r-2 after:border-b-2 dark:after:border-white after:border-blue-950">
                    <div class="transition-all duration-400 sm:w-1/3 w-full h-full flex justify-center items-center rounded-s-md sm:pb-10">
                        <img src="{{ asset('img/Null.webp') }}" alt="Image"
                            class="transition-all duration-400 w-full h-8/12 aspect-video object-center rounded-s-md">
                    </div>
                    <div
                        class="transition-all duration-400 sm:static absolute left-0 top-0 sm:w-2/3 w-full h-full flex flex-col justify-center items-start sm:gap-10 gap-2 p-5 sm:bg-transparent dark:bg-black/80 bg-white/80">
                        <div
                            class="transition-all duration-400 w-full h-7/11 flex flex-col justify-center items-start gap-2 px-5">
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-user-alt dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Nom :</span>
                                    <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->nom }}</span>
                                </span>
                            </p>
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-user-alt dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Prénom :</span>
                                    <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->prenom }}</span>
                                </span>
                            </p>
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-code-branch dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Specialité :</span>
                                    <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">
                                        @foreach ($specialites as $sp)
                                            @if ($etd->specialite_id == $sp->id)
                                                <span class="sm:inline hidden">{{ $sp->intitule }}</span>
                                                ( {{ $sp->abreviation }} )
                                            @endif
                                        @endforeach
                                    </span>
                                </span>
                            </p>
                        </div>
                        <div
                            class="transition-all duration-400 w-full h-7/11 flex sm:flex-row flex-col justify-center items-center sm:gap-0 gap-4">
                            <div
                                class="transition-all duration-400 sm:w-1/2 w-full h-full flex flex-col justify-center items-start gap-5 px-5">
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-id-card dark:text-white text-black"></i>
                                    <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Matricule :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->matricule }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-calendar-day dark:text-white text-black"></i>
                                    <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Date de naissance :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">
                                            @php
                                                $date = new DateTime($etd->date_naissance);
                                                echo $date->format('d/m/Y');
                                            @endphp
                                        </span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-location-dot dark:text-white text-black"></i>
                                    <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Lieu :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->lieu }}</span>
                                    </span>
                                </p>
                            </div>
                            <div
                                class="transition-all duration-400 sm:w-1/2 w-full h-full flex flex-col justify-center items-start gap-5 px-5">
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    @if ($etd->redoublant == 'oui')
                                        <i class="fa-solid fa-check dark:text-white text-black"></i>
                                    @else
                                        <i class="fa-solid fa-xmark dark:text-white text-black"></i>
                                    @endif
                                    <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Redoublant :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->redoublant }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-arrow-up-9-1 dark:text-white text-black"></i>
                                    <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Niveau :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->niveau }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                    <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Responsable :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">
                                            @php
                                                foreach ($responsables as $resp) {
                                                    if ($etd->responsable_id == $resp->id) {
                                                        echo $resp->nom;
                                                    }
                                                }
                                            @endphp
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div
                            class="transition-all duration-400 w-full h-1/11 flex flex-col justify-center items-start gap-2 px-5">
                            <p class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                <span class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                    <span>Statut :</span>
                                    <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $etd->statut }}</span>
                                </span>
                            </p>
                        </div>
                        <div
                            class="transition-all duration-400 w-full h-1/11 flex justify-end items-center gap-5 sm:pr-0 pr-5">
                            <a href="{{ route('etudiant.edit', $etd) }}"
                                class="transition-all duration-400 text-emerald-400 text-xl cursor-pointer hover:scale-105 active:scale-90">
                                <i class="fa-solid fa-user-edit"></i>
                            </a>
                            <form action="{{ route('etudiant.destroy', $etd) }}" method="POST"
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

        {{ $etudiants->links() }}

        @include('layout.footer')
    </x-container>
@endsection
