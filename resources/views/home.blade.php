@extends('layout.layout')
@section('title')
    Accueil
@endsection
@section('css_js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        <div class="transition-all duration-400 relative w-[95%] h-100 flex justify-center items-center">
            <div id="caroussel" class="transition-all duration-400 sm:flex hidden w-1/2 h-full">
                <img src="{{ asset('img/image_2.jpg') }}" alt="Image"
                    class="transition-all duration-400 aspect-video w-full h-full object-center">
            </div>
            <div
                class="transition-all duration-400 sm:w-1/2 w-full h-full flex flex-col justify-center items-start bg-black/80 gap-5 p-10">
                <p
                    class="transition-all duration-400 w-full flex justify-start items-center text-justify sm:text-2xl text-xl">
                    Bienvenu sur &nbsp;<span class="transition-all duration-400 font-bold italic">InvTrack</span>.
                </p>
                <p class="transition-all duration-400 w-full flex justify-center items-center text-justify text-base">
                    InvTrack est votre logiciel de gestion du stock sortant pendant les cours, ceci pour empêcher
                    toute perte de matériel et ainsi garantir la quasi-permanente disponibilité du matériel ainsi
                    qu'un suivi pas à pas du stock.
                </p>
            </div>
        </div>
        <hr class="transition-all duration-400 w-full h-1 bg-white">

        <div
            class="transition-all duration-400 sticky top-18 left-0 w-[98%] flex flex-col justify-center items-start gap-3 bg-black/80 z-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center gap-5">
                <span class="mr-2 sm:text-xl text-base text-nowrap"><i class="fa-solid fa-filter mr-5"></i>Filtre /
                    matériel
                    : ...</span>
                <div id="filterContainer"
                    class="transition-all duration-400 w-full flex justify-start items-center pl-5 sm:pl-0 sm:gap-3 gap-10 overflow-hidden pr-5">
                    <a href="{{ route('home') }}"
                        class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] bg-black text-white font-extrabold rounded-md cursor-pointer border-b-2 border-white active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 before:border-white before:w-0 hover:before:left-0 hover:before:w-full">Tout</a>
                    @foreach ($categories as $categorie)
                        <form action="{{ route('home') }}" method="POST"
                            class="transition-all duration-400 flex justify-center items-center">
                            @csrf
                            <input type="hidden" name="search" value="{{ $categorie->intitule }}">
                            <input type="hidden" name="action" value="filter">
                            <input type="hidden" name="page" value="home">
                            <button type="submit"
                                class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] bg-black text-white font-extrabold rounded-md cursor-pointer border-b-2 border-white active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 before:border-white before:w-0 hover:before:left-0 hover:before:w-full">
                                {{ $categorie->intitule }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
            <div class="transition-all duration-400 w-full hidden max-[600px]:flex justify-center items-center gap-7">
                <i id="filter-left"
                    class="fa fa-chevron-left transition-all duration-400 hover:scale-105 active:scale-85 cursor-pointer"
                    style="font-size: 17pt;"></i>
                <i id="filter-right"
                    class="fa fa-chevron-right transition-all duration-400 hover:scale-105 active:scale-85 cursor-pointer"
                    style="font-size: 17pt;"></i>
            </div>
        </div>

        <div class="transition-all duration-400 sm:w-11/12 w-[95%] flex flex-col justify-start items-start gap-20 pl-5">

            @if ($searchs !== null)
                <x-category icon="stethoscope" name="Resultats de recherche" :count="count($searchs)">
                    @forelse ($searchs as $data)
                        <x-materiel :image="asset('img/image_7.jpg')" name="{{ $data->libelle }}" indice="{{ $data->intitule }}" />
                    @empty
                        <x-materiel :image="asset('img/Null.webp')" name="Aucun resultat 😥" />
                    @endforelse
                </x-category>
            @endif

            @if ($searchs == null)
                {{-- Santé --}}

                @php
                    $count_s = 0;
                    $sante = [];
                @endphp

                @foreach ($categories as $cat)
                    @foreach ($materiels as $mat)
                        @if ($cat->id == $mat->categories_id && strtolower($cat->intitule) == 'santé')
                            @php
                                $count_s++;
                                array_push($sante, $mat);
                            @endphp
                        @endif
                    @endforeach
                @endforeach

                <x-category icon="stethoscope" name="Santé" :count="$count_s">
                    @forelse ($sante as $s)
                        <x-materiel :image="asset('img/image_7.jpg')" name="{{ $s->libelle }}" />
                    @empty
                        <x-materiel :image="asset('img/Null.webp')" name="Aucun resultat 😥" />
                    @endforelse
                </x-category>


                {{-- Informatique --}}

                @php
                    $count_i = 0;
                    $informatique = [];
                @endphp

                @foreach ($categories as $cat)
                    @foreach ($materiels as $mat)
                        @if ($cat->id == $mat->categories_id && strtolower($cat->intitule) == 'informatique')
                            @php
                                $count_i++;
                                array_push($informatique, $mat);
                            @endphp
                        @endif
                    @endforeach
                @endforeach

                <x-category icon="laptop-code" name="Informatique" :count="$count_i">
                    @forelse ($informatique as $i)
                        <x-materiel :image="asset('img/image_8.jpg')" name="{{ $i->libelle }}" count="4" />
                    @empty
                        <x-materiel :image="asset('img/Null.webp')" name="Aucun resultat 😥" />
                    @endforelse
                </x-category>


                {{-- Technique --}}

                @php
                    $count_t = 0;
                    $technique = [];
                @endphp

                @foreach ($categories as $cat)
                    @foreach ($materiels as $mat)
                        @if ($cat->id == $mat->categories_id && strtolower($cat->intitule) == 'technique')
                            @php
                                $count_t++;
                                array_push($technique, $mat);
                            @endphp
                        @endif
                    @endforeach
                @endforeach

                <x-category icon="screwdriver-wrench" name="Technique" :count="$count_t">
                    @forelse ($technique as $t)
                        <x-materiel :image="asset('img/image_6.jpg')" name="{{ $t->libelle }}" />
                    @empty
                        <x-materiel :image="asset('img/Null.webp')" name="Aucun resultat 😥" />
                    @endforelse
                </x-category>


                {{-- Autre --}}

                @php
                    $count_a = 0;
                    $autre = [];
                @endphp

                @foreach ($categories as $cat)
                    @foreach ($materiels as $mat)
                        @if ($cat->id == $mat->categories_id && strtolower($cat->intitule) == 'autre')
                            @php
                                $count_a++;
                                array_push($autre, $mat);
                            @endphp
                        @endif
                    @endforeach
                @endforeach

                <x-category name="Autre" :count="$count_a" icon="fa-solid fa-layer-group">
                    @forelse ($autre as $a)
                        <x-materiel :image="asset('img/image_5.jpg')" name="{{ $a->libelle }}" />
                    @empty
                        <x-materiel :image="asset('img/Null.webp')" name="Aucun resultat 😥" />
                    @endforelse
                </x-category>
            @endif
        </div>

        <div id="top"
            class="transition-all duration-400 fixed right-10 bottom-10 text-3xl cursor-pointer opacity-70 z-200 hover:opacity-100 hover:scale-105 active:scale-80">
            <i class="fa-solid fa-chevron-circle-up"></i>
        </div>

        @include('layout.footer')
    </x-container>
@endsection
