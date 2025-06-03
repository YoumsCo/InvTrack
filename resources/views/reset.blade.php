@extends('layout.layout')
@section('title')
    Modifier le mot de passe
@endsection
@section('css_js')
    @vite(['resources/js/reset.js'])
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
            <div
                class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start bg-black/80 min-[850px]:rounded-s-xl rounded-xl">
                    <p id="text" class="transition-all duration-400 min-[850px]:block hidden sm:text-xl text-center"></p>
                </div>
            </div>
            <form action="{{ route('reset') }}" method="POST" autocomplete="off"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex flex-col justify-center items-center gap-4 p-10">
                @csrf
                <div class="transition-all duration-400 w-full flex justify-center items-center">
                    <h2 class="transition-all duration-400 sm:text-2xl text-xl font-['papyrus']">Changez votre mot de passe
                    </h2>
                </div>
                <x-input label="Matricule" id="matricule" name="matricule" placeholder="Entrez votre matricule"
                    icon="fa-solid fa-user-tie" />
                <x-input type="password" label="Mot de passe" id="password" name="password" placeholder="Mot de passe"
                    icon="fa-solid fa-eye" iconId="eye" />
                <x-input type="password" label="Confimrez le mot de passe" id="confirm-password" name="confirm-password"
                    placeholder="Confirmez votre mot de passe" icon="fa-solid fa-lock" iconId="eye" />
                <x-button type="submit" content="Soumettre" />
                <div class="transition-all duration-400 w-full flex justify-center items-center">
                    <a href="{{ route('auth') }}" class="transition-all duration-400 text-base"><i
                            class="fa-solid fa-arrow-left"></i> &nbsp; Retour</a>
                </div>
            </form>
        </div>
    </x-container>
@endsection
