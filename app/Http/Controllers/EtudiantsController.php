<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use App\Models\Responsables;
use App\Models\Specialites;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request->search) {
            return view('etudiant.list', [
                'etudiants' => Etudiants::where("matricule", "like", "%{$request->search}%")
                    ->orWhere("nom", "like", "%{$request->search}%")
                    ->orWhere("prenom", "like", "%{$request->search}%")
                    ->orWhere("date_naissance", "like", "%{$request->search}%")
                    ->orWhere("lieu", "like", "%{$request->search}%")
                    ->orWhere("redoublant", "like", "%{$request->search}%")
                    ->orWhere("niveau", "like", "%{$request->search}%")
                    ->orWhere("statut", "like", "%{$request->search}%")
                    ->simplePaginate(5),
                'responsables' => Responsables::all(),
                'specialites' => Specialites::all(),
                'paginate' => false,
                
            ]);
        }
        return view('etudiant.list', [
            'etudiants' => Etudiants::latest()->simplePaginate(5),
            'responsables' => Responsables::all(),
            'specialites' => Specialites::all(),
            'paginate' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('etudiant.add', [
            "specialites" => Specialites::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'matricule' => 'required|string|unique:etudiants,matricule',
            'date_naissance' => 'required|date',
            'lieu' => 'required|string',
            'redoublant' => 'required|boolean',
            'specialite' => 'required|string|exists:specialites,intitule',
            'niveau' => 'required|integer',
            'statut' => 'required|string|exists:etudiants,statut',
        ]);

        if ($credentials["redoublant"] == true) {
            $credentials["redoublant"] = "Oui";
        } else {
            $credentials["redoublant"] = "Non";
        }

        $credentials["lieu"] = ucfirst(strtolower($credentials["lieu"]));

        $datas = Specialites::where("intitule", $credentials["specialite"])->get();

        Etudiants::create([
            'specialite_id' => $datas->first()->id,
            'responsable_id' => $datas->first()->responsable_id,
            'matricule' => $credentials["matricule"],
            'nom' => $credentials["nom"],
            'prenom' => $credentials["prenom"],
            'date_naissance' => $credentials["date_naissance"],
            'lieu' => $credentials["lieu"],
            'redoublant' => $credentials["redoublant"],
            'niveau' => $credentials["niveau"],
            'statut' => $credentials["statut"],
        ]);


        return redirect()->route("etudiant.index")->with("message", "{$credentials["nom"]} ajouté effectuées");
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiants $etudiants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiants $etudiant): View
    {
        return view('etudiant.edit', [
            'datas' => $etudiant,
            "specialites" => Specialites::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiants $etudiant): RedirectResponse
    {
        $credentials = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|date',
            'lieu' => 'required|string',
            'redoublant' => 'required|boolean',
            'specialite' => 'required|string|exists:specialites,intitule',
            'niveau' => 'required|integer',
            'statut' => 'required|string|exists:etudiants,statut',
        ]);

        if ($credentials["redoublant"] == true) {
            $credentials["redoublant"] = "Oui";
        } else {
            $credentials["redoublant"] = "Non";
        }

        $credentials["lieu"] = ucfirst(strtolower($credentials["lieu"]));

        $datas = Specialites::where("intitule", $credentials["specialite"])->get();

        $tabValue = [
            'nom' => $credentials["nom"],
            'prenom' => $credentials["prenom"],
            'specialite_id' => $datas->first()->id,
            'date_naissance' => $credentials["date_naissance"],
            'lieu' => $credentials["lieu"],
            'redoublant' => $credentials["redoublant"],
            'niveau' => $credentials["niveau"],
            'statut' => $credentials["statut"],
        ];

        Etudiants::find($etudiant->id)->update(array_merge(Etudiants::find($etudiant->id)->toArray(), $tabValue));

        return redirect()->route("etudiant.index")->with("message", "Modifications effectuées");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiants $etudiant): RedirectResponse
    {
        Etudiants::find($etudiant->id)->delete(Etudiants::find($etudiant->id));
        return redirect()->route("etudiant.index")->with("message", "Suppréssion effectuée");
    }
}
