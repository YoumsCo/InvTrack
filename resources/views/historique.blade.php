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

        <div class="transition-all duration-400 w-[95%] flex flex-col justify-start items-start gap-5 px-10">

            @forelse ($datas as $data)
                <div class="transition-all duration-400 w-full flex flex-col justify-start items-start gap-5">
                    <h2
                        class="transition-all duration-400 relative sm:text-xl text-center before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] before:bg-white after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] after:bg-white">
                        <span class="transition-all duration-400 flex justify-center items-center flex-nowrap gap-2">
                            <i class="fa-solid fa-calendar-day"></i>
                            <span>Aujourd'hui</span>
                        </span>
                    </h2>

                    <div
                        class="transition-all duration-400 relative w-full min-h-50 flex flex-col justify-start items-start gap-3 border-l-2 border-white bg-gray-950 rounded-e-xl my-10 px-5 py-5 before:transition-all before:duration-400 before:absolute before:-top-3 before:-left-3 before:w-6 before:h-6 before:bg-black before:border-6 before:border-white before:rounded-full">

                        <div
                            class="transition-all duration-400 w-full flex sm:flex-row flex-col justify-start items-start sm:gap-0 gap-3">
                            <div
                                class="transition-400 duration-400 sm:w-1/2 w-full sm:h-full flex flex-col justify-start items-start gap-3 px-3">
                                <p
                                    class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <span>
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        <span>Matériel : </span>
                                        <span
                                            class="transition-all duration-400 ml-2 text-blue-200 truncate">{{ $data->libelle }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <span>
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        <span>Statut : </span>
                                        <span
                                            class="transition-all duration-400 ml-2 text-blue-200 truncate">{{ $data->etat }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <span>
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        <span>Catégorie : </span>
                                        <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                            {{ $data->libelle }}
                                        </span>
                                    </span>
                                </p>
                            </div>

                            <div
                                class="transition-400 duration-400 sm:w-1/2 w-full sm:h-full flex flex-col justify-start items-start gap-3 px-3 sm:border-l-2 border-white">
                                <p
                                    class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <span>
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        <span>Etudiant : </span>
                                        <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                            {{ $data->nom }} {{ $data->prenom }}
                                        </span>
                                    </span>
                                </p>
                                <p
                                    class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <span>
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        <span>Statut : </span>
                                        <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                            {{ $data->statut }}
                                        </span>
                                    </span>
                                </p>
                                <p
                                    class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <span>
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        <span>Spécialité : </span>
                                        <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                            @foreach ($specialites as $spe)
                                                @if ($data->specialite_id == $spe->id)
                                                    {{ $spe->abreviation }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div
                            class="transition-400 duration-400 w-full flex flex-col justify-start items-start gap-3 px-3 sm:border-t-2 border-white">
                            <p class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <span>
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span>
                                    <span>Cours : </span>
                                    <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                        {{ $data->intitule }}
                                    </span>
                                </span>
                            </p>
                            <p class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <span>
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span>
                                    <span>Debut : </span>
                                    <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                        @php
                                            [$h, $m, $s] = explode(':', $data->debut);
                                            echo (string) $h . 'h ' . $m;
                                        @endphp
                                    </span>
                                </span>
                            </p>
                            <p class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <span>
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span>
                                    <span>Fin : </span>
                                    <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                        @php
                                            [$h, $m, $s] = explode(':', $data->fin);
                                            echo (string) $h . 'h ' . $m;
                                        @endphp
                                    </span>
                                </span>
                            </p>
                            <p class="transition-400 duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                <span>
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <span>
                                    <span>Durée : </span>
                                    <span class="transition-all duration-400 ml-2 text-blue-200 truncate">
                                        {{ $data->duree }}
                                    </span>
                                </span>
                            </p>
                        </div>

                        <div
                            class="transition-all duration-400 w-full flex sm:justify-end justify-center items-center pr-5">
                            <form action="#" method="POST">
                                @csrf
                                <x-button type="submit" content="Restituer" />
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="transition-all duration-400 w-full flex justify-center items-center">
                    <span class="transition-all duration-400 text-xl animated-pulse">Vide</span>
                </div>
            @endforelse

        </div>


        @include('layout.footer')
    </x-container>
@endsection
