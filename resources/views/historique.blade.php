@extends('layout.layout')
@section('title')
    Historique
@endsection
@section('css_js')
    @vite(['resources/css/historique.css'])
@endsection
@section('body')
    <x-container>
        @if (session('message'))
            <div class="transition-all duration-400 w-full h-full flex justify-center items-center">
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            </div>
        @endif

        @include('layout.head')

        <x-nav action="home" method="POST" page="home" />

        <div class="transition-all duration-400 w-full flex justify-start items-center px-5">
            <h2
                class="transition-all duration-400 relative sm:text-3xl text-xl text-center before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] before:bg-white after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] after:bg-white">
                Historique
            </h2>
        </div>

        <div class="transition-all duration-400 relative w-[95%] h-100 flex justify-center items-center">



        </div>

        <div id="top"
            class="transition-all duration-400 fixed right-10 bottom-10 text-3xl cursor-pointer opacity-70 z-200 hover:opacity-100 hover:scale-105 active:scale-80">
            <i class="fa-solid fa-chevron-circle-up"></i>
        </div>

        @include('layout.footer')
    </x-container>
@endsection
