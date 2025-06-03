@extends('layout.layout')
@section('title')
    Authentification
@endsection
@section('css_js')
    @vite(['resources/js/auth.js'])
@endsection
@section('body')
    <x-container centerZ>
        @if (session('message'))
            <x-alert :message="session('message')" />
        @endif
        @if (session('error'))
            <x-alert :message="session('error')" />
        @endif
        <div
            class="transition-all duration-400 relative min-[850px]:w-[800px] w-[80%] min-h-96 flex justify-center items-center border-2 border-white rounded-lg">
            <div class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start bg-black/80 min-[850px]:rounded-s-xl rounded-xl">
                    <p id="text" class="transition-all duration-400 sm:text-xl text-center"></p>
                </div>
            </div>
            <form action="{{ route('auth') }}" method="POST" autocomplete="off"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex flex-col justify-center items-center gap-4 p-10">
                @csrf
                <div class="transition-all duration-400 w-full flex justify-center items-center">
                    <h2 class="transition-all duration-400 sm:text-2xl text-xl font-['papyrus']">Authentifiez vous</h2>
                </div>
                <x-input label="Nom" id="nom" name="nom" placeholder="Entrez votre nom"
                    icon="fa-solid fa-user-tie" />
                <x-input type="password" label="Mot de passe" id="password" name="password" placeholder="Mot de passe"
                    icon="fa-solid fa-eye" iconId="eye" />
                <x-button type="submit" content="Soumettre" />
                <div class="transition-all duration-400 w-full flex justify-center items-center">
                    <a href="{{ route('reset') }}" class="transition-all duration-400 text-base">Mot de passe oublié
                        ?</a>
                </div>
            </form>
        </div>
    </x-container>
@endsection
