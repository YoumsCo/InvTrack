@extends('layout.layout')
@section('title')
    Ajouter un responsable
@endsection
@section('css_js')
    @vite(['resources/js/responsable/add.js'])
@endsection
@section('body')
    <x-container centerZ>
        @if (session('error'))
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
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
        <div
            class="transition-all duration-400 relative min-[850px]:w-[800px] w-[80%] h-[450px] flex justify-center items-center border-2 border-white rounded-lg">
            <div
                class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start bg-black/80 min-[850px]:rounded-s-xl rounded-xl">
                    <p id="text" class="transition-all duration-400 sm:block hidden sm:text-xl text-center"></p>
                </div>
            </div>
            <form action="{{ route('responsable.store') }}" method="POST" autocomplete="off"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex flex-col justify-center items-center gap-4">
                @csrf
                <div class="transition-all duration-400 w-full h-[15%] flex justify-center items-center">
                    <h2
                        class="transition-all duration-400 h-full flex justify-center items-center sm:text-2xl text-xl font-['papyrus']">
                        Ajoutez-en un
                    </h2>
                </div>
                <div id="step" class="transition-all duration-400 w-full h-[85%] flex aspect-video overflow-hidden">
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-3 px-10">
                        <x-input label="Matricule" id="matricule" name="matricule" placeholder="Entrez son matricule"
                            icon="fa-solid fa-id-card" />
                        <x-input label="Nom" id="nom" name="nom" placeholder="Entrez son nom"
                            icon="fa-solid fa-user-tie" />
                        <x-input label="Prénom" id="prenom" name="prenom" placeholder="Entrez son prénom"
                            icon="fa-solid fa-user-tie" />
                        <div class="transition-all duration-400 w-full flex justify-center items-center gap-3">
                            <x-button type="button" id="next" content="Suivant" />
                        </div>
                    </div>
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-3 px-10">
                        <x-input label="Téléphone" id="telephone" name="telephone" placeholder="690909090"
                            icon="fa-solid fa-mobile-alt" />
                        <x-input label="Specialisation" id="specialisation" name="specialisation"
                            placeholder="Entrez sa spécialisation" icon="fa-solid fa-code-branch" />
                        <x-input label="Titre" id="titre" name="titre" placeholder="Entrez son titre"
                            icon="fa-solid fa-circle-check" />
                        <div class="transition-all duration-400 w-full flex justify-center items-center gap-3">
                            <x-button type="button" id="back" content="Retour" />
                            <x-button type="submit" content="Soumettre" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
@endsection
