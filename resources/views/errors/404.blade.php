@extends('layout.layout')
@section('title')
    Page inexistante
@endsection
@section('css_js')
    @vite(entrypoints: ['resources/js/app.js'])
@endsection
@section('body')
    <x-container centerZ>
        <p class="transition-all duration-500 sm:text-6xl text-2xl animate-bounce">😥</p>
        <p>Oups cette page n'existe pas !!</p>
        <a href={{ route('home') }}
            class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] bg-black text-white font-extrabold rounded-md cursor-pointer border-b-2 border-white active:scale-80 hover:scale-105 hover:shadow-md hover:shadow-white before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 before:border-white before:w-0 hover:before:left-0 hover:before:w-full animate-pulse">Accueil</a>
    </x-container>
@endsection
