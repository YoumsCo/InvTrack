@extends('layout.layout')
@section('title')
    Ajouter un matériel
@endsection
@section('css_js')
    @vite(['resources/js/materiel/add.js'])
@endsection
@section('body')
    <x-container centerZ>
        @if (session('error'))
            <x-alert :message="session('error')" />
        @endif
        @if (session('message'))
            <x-alert :message="session('message')" />
            <span>{{ session('message') }}</span>
        @endif

        <div
            class="transition-all duration-400 relative min-[850px]:w-[800px] w-[80%] h-96 flex justify-center items-center border-2 dark:border-white border-black rounded-lg">
            <div
                class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start dark:bg-black/80 bg-white/70 min-[850px]:bg-black/50 ">
                    <p id="text" class="transition-all duration-400 sm:block hidden sm:text-xl text-center"></p>
                </div>
            </div>
            <form action="{{ route('materiel.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex flex-col justify-center items-center gap-4">
                @csrf
                <div class="transition-all duration-400 w-full h-[15%] flex justify-center items-center">
                    <h2
                        class="transition-all duration-400 h-full flex justify-center items-center sm:text-2xl text-xl font-['papyrus'] dark:text-white text-black dark:font-normal font-bold">
                        Ajoutez-en un
                    </h2>
                </div>
                <div id="step" class="transition-all duration-400 w-full h-[85%] flex aspect-video overflow-hidden">
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-5 px-10">
                        <x-input label="Matricule" id="matricule" name="matricule" placeholder="Entrez son matricule"
                            icon="fa-solid fa-fingerprint" />
                        <x-input label="Nom" id="nom" name="nom" placeholder="Entrez son nom"
                            icon="fa-solid fa-signature" />
                        <div class="transition-all duration-400 w-full flex justify-center items-center gap-3">
                            <x-button type="button" id="next" content="Suivant" />
                        </div>
                    </div>
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-5 px-10">
                        <x-input label="Catégorie" id="categorie" name="categorie" placeholder="Entrez sa catégorie"
                            icon="fa-solid fa-code-branch" list="categories_list" />
                        <datalist id="categories_list">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->intitule }}"></option>
                            @endforeach
                        </datalist>
                        <x-input type="file" label="Image" id="image" name="image"
                            icon="fa-solid fa-image" />
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
