@extends('layout.layout')
@section('title')
    Modifier : {{ $datas->prenom }}
@endsection
@section('css_js')
    @vite(['resources/js/etudiant/edit.js'])
@endsection
@section('body')
    <x-container centerZ>
        @if (session('error'))
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
        @if (session('message'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        @endif
        <div
            class="transition-all duration-400 relative min-[850px]:w-[800px] w-[80%] h-[450px] flex justify-center items-center border-2 border-white rounded-lg">
            <div
                class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start bg-black/80 min-[850px]:rounded-s-xl rounded-xl">
                    <p id="text" class="transition-all duration-400 sm:block hidden sm:text-xl text-center"></p>
                </div>
            </div>
            <form action="{{ route('etudiant.update', $datas) }}" method="POST" autocomplete="off"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex flex-col justify-center items-center gap-4">
                @csrf
                @method('PUT')
                <div class="transition-all duration-400 w-2/3 h-[15%] flex justify-center items-center">
                    <h2
                        class="transition-all duration-400 h-full flex flex-nowrap justify-center items-center sm:text-2xl text-xl font-['papyrus'] text-nowrap">
                        Modifiez : <span
                            class="trasnition-all duration-400 w-1/2 text-emerald-400 ml-2 underline truncate">{{ $datas->prenom }}</span>
                    </h2>
                </div>
                <div id="step" class="transition-all duration-400 w-full h-[85%] flex aspect-video overflow-hidden">
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-6 px-10">
                        <x-input label="Nom" id="nom" name="nom" placeholder="Entrez son nom"
                            icon="fa-solid fa-user-alt" :value="$datas->nom" />
                        <x-input label="Prénom" id="prenom" name="prenom" placeholder="Entrez son prénom"
                            icon="fa-solid fa-user-alt" :value="$datas->prenom" />
                        @foreach ($specialites as $spe)
                            @if ($spe->id == $datas->specialite_id)
                                <x-input label="Spécialité" id="specialite" name="specialite"
                                    placeholder="Entrez la spécialité" icon="fa-solid fa-code-branch" :value="$spe->intitule"
                                    list="specialites_list" />
                            @endif
                        @endforeach
                        <datalist id="specialites_list">
                            @foreach ($specialites as $spe)
                                <option value="{{ $spe->intitule }}">({{ $spe->abreviation }})</option>
                            @endforeach
                        </datalist>
                        <div class="transition-all duration-400 w-full flex justify-center items-center gap-3">
                            <x-button type="button" id="next-to-second" content="Suivant" />
                        </div>
                    </div>
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-3 px-10">
                        <x-input type="date" label="Date de naissance" id="date_naissance" name="date_naissance"
                            placeholder="Entrez sa date de naissance" icon="fa-solid fa-calendar-day" :value="$datas->date_naissance" />
                        <x-input label="Lieu" id="lieu" name="lieu" placeholder="Entrez le lieu"
                            icon="fa-solid fa-map-marker-alt" :value="$datas->lieu" />

                        <div
                            class="transition-all duration-400 relative w-full flex flex-col justify-center items-start gap-5">
                            <label for="redoublant" class="transition-all duration-400">Il redouble ?</label>

                            <div class="transition-all duration-400 w-full flex flex-col justify-center items-start gap-2">
                                <div class="transition-all duration-400 w-full flex justify-start items-center gap-5">
                                    <span class="transition-all duration-400 flex justify-start items-center gap-3 text-xl">
                                        <i class="fa-solid fa-check"></i>
                                        <input type="radio" id="redoublant" name="redoublant" value="1"
                                            @if (strtolower($datas->redoublant) == 'oui') checked @endif
                                            class="transition-all duration-400 w-full cursor-pointer hover:scale-110 active:scale-90">
                                        <span class="transition-all duration-400 text-base">Oui</span>
                                    </span>
                                    <span class="transition-all duration-400 flex justify-start items-center gap-3 text-xl">
                                        <i class="fa-solid fa-xmark"></i>
                                        <input type="radio" id="redoublant" name="redoublant" value="0"
                                            @if (strtolower($datas->redoublant) == 'non') checked @endif
                                            class="transition-all duration-400 w-full cursor-pointer hover:scale-110 active:scale-90">
                                        <span class="transition-all duration-400 text-base">Non</span>
                                    </span>
                                </div>
                                @error('redoublant')
                                    <p class="transition-all duration-400 w-full text-wrap text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="transition-all duration-400 w-full flex justify-center items-center gap-3">
                            <x-button type="button" id="back-to-first" content="Retour" />
                            <x-button type="button" id="next" content="Suivant" />
                        </div>
                    </div>
                    <div
                        class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center aspect-video gap-10 px-10">
                        <x-input label="Niveau" id="niveau" name="niveau" placeholder="1"
                            icon="fa-solid fa-arrow-up-9-1" :value="$datas->niveau" />
                        <select name="statut"
                            class="transition-all duration-400 w-full border-b-2 border-white cursor-pointer focus:outline-none">
                            <option value="Delegue" @if (strtolower($datas->statut) == 'delegue') selected @endif
                                class="transition-all duration-400 cursor-pointer bg-black text-white">
                                Délégué</option>
                            <option value="Vice delegue" @if (strtolower($datas->statut) == 'vice delegue') selected @endif
                                class="transition-all duration-400 cursor-pointer bg-black text-white">Vice délégué
                            </option>
                        </select>
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
