@extends('layout.layout')
@section('title')
    Liste des responsables
@endsection
@section('css_js')
@endsection
@section('body')
    <x-container>
        @if (session('message'))
            <x-alert :message="session('message')" />
        @endif

        @include('layout.head')

        <x-nav action="responsable.index" page="responsable_list" />

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex justify-start items-center gap-5 pl-5">
            <x-a :href="route('responsable.index')" text="Tout" />
            <x-a :href="route('responsable.create')" text="Ajouter un responsable" />
        </div>

        {{ $responsables->links() }}

        <div class="transition-all duration-400 sm:w-11/12 w-[96%] flex flex-col justify-start items-start px-5">
            <div class="transition-all duration-400 w-full flex justify-start items-center">
                <h2
                    class="transition-all duration-400 relative sm:text-3xl text-xl text-center dark:text-white text-blue-950 font-bold before:transition-all before:duration-400 before:absolute before:-bottom-1 before:left-0 before:w-full before:h-[2px] dark:before:bg-white before:bg-blue-950 after:transition-all after:duration-400 after:absolute after:-bottom-3 after:left-0 after:w-1/2 after:h-[2px] dark:after:bg-white after:bg-blue-950">
                    Liste des responsables <span
                        class="transition-all duration-400 dark:text-blue-200 text-blue-900 ml-2 text-xl">({{ count($responsables) }})</span>
                </h2>
            </div>


            @forelse ($responsables as $resp)
                <div
                    class="transition-all duration-400 relative w-full sm:h-60 h-80 flex justify-center items-center rounded-md my-10 p-5 dark:bg-transparent bg-black/10 before:tranition-all before:duration-400 before:absolute before:left-0 before:top-0 before:w-5 before:h-5 before:border-l-2 before:border-t-2 dark:before:border-white before:border-blue-950 after:tranition-all after:duration-400 after:absolute after:right-0 after:bottom-0 after:w-5 after:h-5 after:border-r-2 after:border-b-2 dark:after:border-white after:border-blue-950">
                    <div class="transition-all duration-400 sm:w-1/3 w-full h-full rounded-s-md">
                        <img src="{{ asset('img/teacher.webp') }}" alt="Image"
                            class="transition-all duration-400 w-full h-full aspect-video object-center rounded-s-md mix-blend-multiply">
                    </div>
                    <div
                        class="transition-all duration-400 sm:static absolute left-0 top-0 sm:w-2/3 w-full h-full flex flex-col justify-center items-start sm:gap-10 gap-2 p-5 sm:bg-transparent dark:bg-black/80 bg-white/80">
                        <div
                            class="transition-all duration-400 w-full h-5/6 flex sm:flex-row flex-col justify-center items-center sm:gap-0 gap-4">
                            <div
                                class="transition-all duration-400 sm:w-1/2 w-full h-full flex flex-col justify-center items-start gap-5 px-5">
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                    <span
                                        class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Nom :</span>
                                        <span
                                            class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $resp->nom }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                    <span
                                        class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Prénom :</span>
                                        <span
                                            class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $resp->prenom }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-mobile dark:text-white text-black"></i>
                                    <span
                                        class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Téléphone :</span>
                                        <span
                                            class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $resp->telephone }}</span>
                                    </span>
                                </p>
                            </div>
                            <div
                                class="transition-all duration-400 sm:w-1/2 w-full h-full flex flex-col justify-start items-start gap-5 px-5">
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                    <span
                                        class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Spécialisation :</span>
                                        <span
                                            class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $resp->specialisation }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-user-tie dark:text-white text-black"></i>
                                    <span
                                        class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Titre :</span>
                                        <span
                                            class="transition-all duration-400 dark:text-blue-200 text-blue-950">{{ $resp->titre }}</span>
                                    </span>
                                </p>
                                <p
                                    class="transition-all duration-400 w-full flex flex-nowrap justify-start items-center gap-2">
                                    <i class="fa-solid fa-arrow-up-9-1 dark:text-white text-black"></i>
                                    <span
                                        class="transition-all duration-400 flex gap-3 truncate dark:text-white text-black">
                                        <span>Nombre de spécialités :</span>
                                        <span class="transition-all duration-400 dark:text-blue-200 text-blue-950">
                                            @php
                                                $i = 0;
                                                foreach ($specialites as $spe) {
                                                    if ($resp->id == $spe->responsable_id) {
                                                        $i++;
                                                    }
                                                }
                                                echo $i;
                                            @endphp
                                        </span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div
                            class="transition-all duration-400 w-full h-1/6 flex justify-end items-center gap-5 sm:pr-0 pr-5">
                            <a href="{{ route('responsable.edit', $resp) }}"
                                class="transition-all duration-400 text-emerald-400 text-xl cursor-pointer hover:scale-105 active:scale-90">
                                <i class="fa-solid fa-user-edit"></i>
                            </a>
                            <form action="{{ route('responsable.destroy', $resp) }}" method="POST"
                                class="transition-all duration-400 text-red-500 text-xl cursor-pointer hover:scale-105 active:scale-90">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa-solid fa-trash-alt cursor-pointer"></button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <span class="transition-all duration-400 text-xl animate-pulse my-10">Aucun resultat 😥</span>
            @endforelse
        </div>
        {{ $responsables->links() }}

        @include('layout.footer')
    </x-container>
@endsection
