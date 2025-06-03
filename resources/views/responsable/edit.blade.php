@extends('layout.layout')
@section('title')
    Modifier : {{ $datas->prenom }}
@endsection
@section('css_js')
    @vite(['resources/js/responsable/edit.js'])
@endsection
@section('body')
    <x-container centerZ>
        @if (session('error'))
            <x-alert :message="session('error')" />
        @endif
        @if (session('message'))
            <x-alert :message="session('message')" />
        @endif

        <div
            class="transition-all duration-400 relative min-[850px]:w-[800px] w-[80%] min-h-96 flex justify-center items-center border-2 dark:border-white border-black rounded-lg">
            <div
                class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start dark:bg-black/80 bg-white/70 min-[850px]:bg-black/50 ">
                    <p id="text" class="transition-all duration-400 sm:block hidden sm:text-xl text-center"></p>
                </div>
            </div>
            <form action="{{ route("responsable.update", $datas) }}" method="POST" autocomplete="off"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex flex-col justify-center items-center gap-4 dark:bg-transparent bg-black/5">
                @csrf
                @method("PUT")
                <div class="transition-all duration-400 w-full h-[15%] flex justify-center items-center">
                    <h2 class="transition-all duration-400 h-full flex justify-center items-center sm:text-2xl text-xl font-['papyrus'] dark:text-white text-black dark:font-normal font-bold">Modifiez : <span
                            class="trasnition-all duration-400 text-emerald-500 font-bold ml-2 underline truncate">{{ $datas->prenom }}</span>
                    </h2>
                </div>
                <div id="step" class="transition-all duration-400 w-full h-[85%] flex aspect-video overflow-hidden">
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-3 px-10">
                        <x-input label="Nom" id="nom" name="nom" placeholder="Entrez son nom"
                            icon="fa-solid fa-user-tie" :value="$datas->nom" />
                        <x-input label="Prénom" id="prenom" name="prenom" placeholder="Entrez son prénom"
                            icon="fa-solid fa-user-tie" :value="$datas->prenom" />
                        <x-input label="Téléphone" id="tel" name="tel" placeholder="690909090"
                            icon="fa-solid fa-mobile-alt" :value="$datas->telephone" />
                        <div class="transition-all duration-400 w-full flex justify-center items-center gap-3">
                            <x-button type="button" id="next" content="Suivant" />
                        </div>
                    </div>
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-3 px-10">
                        <x-input label="Specialisation" id="specialisation" name="specialisation"
                            placeholder="Entrez sa spécialisation" icon="fa-solid fa-code-branch" :value="$datas->specialisation" />
                        <x-input label="Titre" id="titre" name="titre" placeholder="Entrez son titre"
                            icon="fa-solid fa-circle-check" :value="$datas->titre" />
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
