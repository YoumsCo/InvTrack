@extends('layout.layout')
@section('title')
    Obtenir : {{ $materiel }}
@endsection
@section('css_js')
    @vite(['resources/css/offload.css', 'resources/js/offload.js'])
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
            class="transition-all duration-400 relative min-[850px]:w-[800px] w-[80%] min-h-96 h-[500px] flex justify-center items-center border-2 border-white rounded-lg">
            <div
                class="transition-all duration-400 relative min-[850px]:w-1/2 w-full h-full flex justify-center items-center">
                <img src="{{ asset('img/INSAM.jpg') }}" alt="Logo"
                    class="transition-all duration-400 w-full h-full aspect-video object-center min-[850px]:rounded-s-xl rounded-xl">
                <div
                    class="transition-all duration-400 absolute left-0 top-0 w-full h-full flex justify-center min-[850px]:items-center items-start bg-black/80 min-[850px]:rounded-s-xl rounded-xl">
                    <p id="text" class="transition-all duration-400 sm:text-xl text-center"></p>
                </div>
            </div>
            <div id="steps-container"
                class="transition-all duration-400 min-[850px]:static absolute top-0 left-0 sm:w-1/2 w-full h-full flex overflow-hidden overscroll-none">
                <div id="first-step"
                    class="transition-all duration-400 w-full h-full flex flex-col justify-center items-center gap-4 p-10 aspect-video">
                    <div class="transition-all duration-400 w-full h-3/4 flex flex-col justify-center items-start gap-7">
                        <p class="transition-all duration-400 w-full flex flex-wrap items-center">
                            <span>Quel est le statut de l'étudiant désirant l'element suivant : </span>
                            <span
                                class="transition-all duration-400 font-bold text-blue-200 px-3">{{ $materiel }}</span>
                            <span class="transition-all duration-400">?</span>
                        </p>
                        <select name="first-step-select" id="first-step-select"
                            class="transition-all duration-400 w-full bg-black text-white cursor-pointer focus:outline-none">
                            <option value="Delegue"
                                class="transition-all duration-400 w-full bg-black text-white cursor-pointer">Délégué
                            </option>
                            <option value="Vice-delegue"
                                class="transition-all duration-400 w-full bg-black text-white cursor-pointer">Vice-délégué
                            </option>
                            <option value="Etudiant"
                                class="transition-all duration-400 w-full bg-black text-white cursor-pointer">Simple
                                étudiant
                            </option>
                        </select>
                    </div>
                    <x-button type="button" id="first-step-next-button" content="Suivant" />
                </div>

                <form action="{{ route('offload', ['token' => $materiel]) }}" method="POST" autocomplete="off"
                    class="transition-all duration-400 w-full h-full flex flex-col justify-center items-center gap-4 p-10 aspect-video"
                    id="second-step">
                    @csrf
                    <div class="transition-all duration-400 w-full flex justify-center items-center">
                        <h2 class="transition-all duration-400 sm:text-2xl text-xl font-['papyrus']">Délégué
                        </h2>
                    </div>
                    <x-input id="second-step-nom" label="Nom du délégué" name="nom" icon="fa-solid fa-user-check"
                        placeholder="Entrez le nom du délégue" list="second-step-etudiants-list" />
                    <datalist id="second-step-etudiants-list">
                        @foreach ($delegues as $delegue)
                            <option value="{{ $delegue->nom }}"></option>
                        @endforeach
                    </datalist>
                    <x-input id="second-step-cours" label="Intitulé du cours" name="cours"
                        placeholder="Entrez l'intitule du cours" icon="fa-solid fa-book" />
                    <x-input type="time" id="second-step-begin-time" label="Debut du cours" name="debut"
                        icon="fa-solid fa-user-clock" />
                    <x-input type="time" id="second-step-begin-time" label="Debut du cours" name="fin"
                        icon="fa-solid fa-stopwatch" />
                    <input type="hidden" name="ref" value="second-step">
                    <input type="hidden" name="materiel" value="{{ $materiel }}">
                    <div class="transition-all duration-400 w-full flex justify-evenly items-center">
                        <x-button type="button" id="second-step-back-button" content="Retour" />
                        <x-button type="submit" name="second-step-submit" content="Soumettre" />
                    </div>
                </form>

                <form action="{{ route('offload', ['token' => $materiel]) }}" method="POST" autocomplete="off"
                    class="transition-all duration-400 w-full h-full flex flex-col justify-center items-center gap-4 p-10 aspect-video"
                    id="third-step">
                    @csrf
                    <div class="transition-all duration-400 w-full flex justify-center items-center">
                        <h2 class="transition-all duration-400 sm:text-2xl text-xl font-['papyrus']">Vice délégué
                        </h2>
                    </div>
                    <x-input id="third-step-nom" label="Nom du vice-délégué" name="third_step_nom"
                        icon="fa-solid fa-user-check" list="third-step-etudiants-list" />
                    <datalist id="third-step-etudiants-list">
                        @foreach ($vice_delegues as $vice_delegue)
                            <option value="{{ $vice_delegue->nom }}"></option>
                        @endforeach
                    </datalist>
                    <x-input id="third-step-cours" label="Intitulé du cours" name="third-step-cours"
                        icon="fa-solid fa-book" />
                    <x-input type="time" id="third-step-begin-time" label="Debut du cours" name="third-step-debut"
                        icon="fa-solid fa-user-clock" />
                    <x-input type="time" id="third-step-begin-time" label="Debut du cours" name="third-step-fin"
                        icon="fa-solid fa-stopwatch" />
                    <input type="hidden" name="ref" value="third-step">
                    <input type="hidden" name="materiel" value="{{ $materiel }}">
                    <div class="transition-all duration-400 w-full flex justify-evenly items-center">
                        <x-button type="button" id="third-step-back-button" content="Retour" />
                        <x-button type="submit" content="Soumettre" />
                    </div>
                </form>

                <form action="{{ route('offload', ['token' => $materiel]) }}" method="POST" autocomplete="off"
                    class="transition-all duration-400 w-full h-full flex flex-col justify-center items-center aspect-video"
                    id="fourth-step">
                    @csrf
                    <div class="transition-all duration-400 w-full h-[20%] flex justify-center items-center">
                        <h2 class="transition-all duration-400 sm:text-2xl text-xl font-['papyrus']">Etudiant
                        </h2>
                    </div>
                    <div id="fourth-step-steps" class="transition-all duration-400 w-full h-[80%] flex overflow-hidden">
                        <div id="fourth-step-step-one"
                            class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center gap-1 px-10 aspect-video">
                            <x-input id="fourth-step-nom" label="Nom de l'etudiant" name="fourth-step-nom"
                                icon="fa-solid fa-user-check" />
                            <x-input id="fourth-step-matricule" label="Matricule" name="fourth-step-matricule"
                                icon="fa-solid fa-id-card" />
                            <x-input id="fourth-step-specialite" label="Spécialité" name="fourth_step_specialite"
                                icon="fa-solid fa-code-branch" list="fourth-step-specialites-list" />
                            <datalist id="fourth-step-specialites-list">
                                @foreach ($specialites as $specialite)
                                    <option value="{{ $specialite->intitule }}"></option>
                                @endforeach
                            </datalist>
                            <x-input type="number" id="fourth-step-niveau" label="Niveau" name="fourth-step-niveau"
                                icon="fa-solid fa-arrow-down-1-9" />
                            <div class="transition-all duration-400 w-full flex justify-evenly items-center">
                                <x-button type="button" id="fourth-step-back-button-one" content="Retour" />
                                <x-button type="button" id="fourth-step-next" content="Suivant" />
                            </div>
                        </div>

                        <div id="fourth-step-step-two"
                            class="transition-all duration-400 w-full h-full flex flex-col justify-start items-center gap-5 px-10 aspect-video">
                            <x-input id="fourth-step-cours" label="Intitulé du cours" name="fourth-step-cours"
                                icon="fa-solid fa-book" />
                            <x-input type="time" id="fourth-step-begin-time" label="Debut du cours"
                                name="fourth-step-debut" icon="fa-solid fa-user-clock" />
                            <x-input type="time" id="fourth-step-begin-time" label="Debut du cours"
                                name="fourth-step-fin" icon="fa-solid fa-stopwatch" />
                            <input type="hidden" name="ref" value="fourth-step">
                            <input type="hidden" name="materiel" value="{{ $materiel }}">
                            <div class="transition-all duration-400 w-full flex justify-evenly items-center">
                                <x-button type="button" id="fourth-step-back-button-two" content="Retour" />
                                <x-button type="submit" content="Soumettre" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
@endsection
