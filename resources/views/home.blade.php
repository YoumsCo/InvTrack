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
            <x-alert :message="session('message')" />
        @endif

        @include('layout.head')
        <x-nav action="home" method="POST" page="home" />

        <div
            class="transition-all duration-400 relative w-[95%] h-100 flex justify-center items-center dark:border-b-0 border-b-2 border-blue-950 dark:pb-0 pb-5">
            <div class="transition-all duration-400 absolute left-0 top-0 sm:block hidden w-1/2 h-full dark:bg-black/20">

            </div>
            <div id="caroussel" class="transition-all duration-400 sm:flex hidden w-1/2 h-full">
                <img src="{{ asset('img/landing.jpg') }}" alt="Image"
                    class="transition-all duration-400 aspect-video w-full h-full object-center mix-blend-multiply">
            </div>
            <div
                class="transition-all duration-400 sm:w-1/2 w-full h-full flex flex-col justify-center items-start dark:bg-black/80 gap-5 p-10">
                <p
                    class="transition-all duration-400 w-full flex justify-start items-center text-justify sm:text-2xl text-xl dark:text-white text-black">
                    Bienvenu sur &nbsp;<span class="transition-all duration-400 font-bold italic">InvTrack</span>.
                </p>
                <p
                    class="transition-all duration-400 w-full flex justify-center items-center text-justify text-base dark:text-white text-black">
                    InvTrack est votre logiciel de gestion du stock sortant pendant les cours, ceci pour empêcher
                    toute perte de matériel et ainsi garantir la quasi-permanente disponibilité du matériel ainsi
                    qu'un suivi pas à pas du stock.
                </p>
            </div>
        </div>

        <hr class="transition-all duration-400 w-full h-1 dark:bg-white bg-black">

        <div
            class="transition-all duration-400 sticky top-18 left-0 w-[98%] flex flex-col justify-center items-start gap-3 dark:bg-black/80 bg-white/80 z-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center gap-5">
                <span class="mr-2 sm:text-xl text-base text-nowrap dark:text-white text-black"><i
                        class="fa-solid fa-filter mr-5"></i>Filtre /
                    matériel
                    : ...</span>
                <div id="filterContainer"
                    class="transition-all duration-400 w-full flex justify-start items-center pl-5 sm:pl-0 sm:gap-3 gap-10 overflow-hidden pr-5">
                    <a href="{{ route('home') }}"
                        class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] dark:bg-black bg-gray-200 dark:text-white text-black font-extrabold rounded-md cursor-pointer border-b-2 dark:border-white border-black aspect-video active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 dark:before:border-white before:border-black before:w-0 hover:before:left-0 hover:before:w-full">Tout</a>
                    @foreach ($categories as $categorie)
                        <form action="{{ route('home') }}" method="POST"
                            class="transition-all duration-400 flex justify-center items-center">
                            @csrf
                            <input type="hidden" name="search" value="{{ $categorie->intitule }}">
                            <input type="hidden" name="action" value="filter">
                            <input type="hidden" name="page" value="home">
                            <button type="submit"
                                class="transition-all duration-500 relative flex justify-center items-center w-[150px] h-[40px] dark:bg-black bg-gray-200 dark:text-white text-black font-extrabold rounded-md cursor-pointer border-b-2 dark:border-white border-black active:scale-80 hover:scale-105 before:transition-all before:duration-500 before:absolute before:left-1/2 before:top-0 before:border-t-2 dark:before:border-white before:border-black before:w-0 hover:before:left-0 hover:before:w-full">
                                {{ $categorie->intitule }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>
            <div class="transition-all duration-400 w-full hidden max-[600px]:flex justify-center items-center gap-7">
                <i id="filter-left"
                    class="fa fa-chevron-left transition-all duration-400 dark:text-white text-black hover:scale-105 active:scale-85 cursor-pointer"
                    style="font-size: 17pt;"></i>
                <i id="filter-right"
                    class="fa fa-chevron-right transition-all duration-400 dark:text-white text-black hover:scale-105 active:scale-85 cursor-pointer"
                    style="font-size: 17pt;"></i>
            </div>
        </div>

        <div class="transition-all duration-400 sm:w-11/12 w-[95%] flex flex-col justify-start items-start gap-20 pl-5">

            {{-- @dd($searchs) --}}

            @if ($searchs !== null)
                <x-category icon="list-check" name="Resultats de recherche" :count="count($searchs)">
                    @forelse ($searchs as $data)
                        <x-materiel :image="asset((string) 'storage/' . $data->image)" name="{{ $data->libelle }}" indice="{{ $data->intitule }}" />
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
                        <x-materiel :image="asset((string) 'storage/' . $s->image)" name="{{ $s->libelle }}" />
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
                        <x-materiel :image="asset((string) 'storage/' . $i->image)" name="{{ $s->libelle }}" />
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
                        <x-materiel :image="asset((string) 'storage/' . $t->image)" name="{{ $t->libelle }}" />
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
                        <x-materiel :image="asset((string) 'storage/' . $a->image)" name="{{ $a->libelle }}" />
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
