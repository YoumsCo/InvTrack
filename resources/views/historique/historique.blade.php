@extends('layout.layout')
@section('title')
    Historique
@endsection
@section('css_js')
@endsection
@section('body')
    <x-container>
        @if (session('message'))
            <x-alert :message="session('message')" />
        @endif

        @include('layout.head')

        <x-nav action="historique" page="historique" />

        <div class="transition-all duration-400 w-full flex justify-start items-center px-5">
            <h2
                class="transition-all duration-400 relative sm:text-3xl text-xl text-center dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] dark:before:bg-white before:bg-blue-950 after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] dark:after:bg-white after:bg-blue-950">
                Historique
            </h2>
        </div>

        <div class="transition-all duration-400 w-[95%] flex flex-col justify-start items-start gap-5 px-10">

            @forelse ($datas as $data)
                <div class="transition-all duration-400 w-full flex flex-col justify-start items-start gap-5">
                    <h2
                        class="transition-all duration-400 relative sm:text-xl text-center dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] dark:before:bg-white before:bg-blue-950 after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] dark:after:bg-white after:bg-blue-950">
                        <span class="transition-all duration-400 flex justify-center items-center flex-nowrap gap-2">
                            <i class="fa-solid fa-calendar-day"></i>
                            @php
                                [$date, $time] = explode(' ', $data->created_at);
                                [$year, $month, $day] = explode('-', $date);

                                if (date('d') == $day) {
                                    echo "Aujourd'hui";
                                } else {
                                    echo $date;
                                }
                            @endphp
                        </span>
                    </h2>

                    <div
                        class="transition-all duration-400 relative w-full min-h-50 flex flex-col justify-start items-start gap-3 dark:border-l-2 border-l-4 dark:border-white border-emerald-500 bg-gray-950 rounded-e-xl my-10 px-5 py-5 before:transition-all before:duration-400 before:absolute before:-top-3 before:-left-3 before:w-6 before:h-6 dark:before:bg-black before:bg-white  before:border-6 dark:before:border-white before:border-black before:rounded-full">

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
                            <form action="{{ route('historique') }}" method="POST">
                                @csrf
                                <input type="hidden" name="materiel" value="{{ $data->libelle }}">
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
