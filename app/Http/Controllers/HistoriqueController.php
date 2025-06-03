<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Cours;
use App\Models\Etudiants;
use App\Models\Etudiants_cours;
use App\Models\Materiels;
use App\Models\Specialites;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HistoriqueController extends Controller
{
    function index(Request $request): View
    {
        if ($request->search) {
            return view("historique", [
                "specialites" => Specialites::all(),
                "datas" => Etudiants_cours::join("materiels", function (JoinClause $join) use ($request) {
                    $join->on("materiels.etudiant_id", "=", "etudiants_cours.etudiants_id");
                })
                    ->join("etudiants", function (JoinClause $join) use ($request) {
                        $join->on("etudiants_cours.etudiants_id", "=", "etudiants.id")
                            ->where("etudiants.nom", "like", (string) "%" . $request->search . "%")
                            // ->orWhere("etudiants.prenom", "like", (string) "%" . $request->search . "%")
                            // ->orWhere("etudiants.matricule", "like", (string) "%" . $request->search . "%")
                            // ->orWhere("etudiants.statut", "like", (string) "%" . $request->search . "%")
                        ;
                    })
                    ->join("cours", function (JoinClause $join) use ($request) {
                        $join->on("etudiants_cours.cours_id", "=", "cours.id")
                            ->where("cours.intitule", "like", (string) "%" . $request->search . "%")
                        ;
                    })
                    ->join("specialites", "specialites.id", "=", "etudiants.specialite_id")
                    ->where("specialites.intitule", "like", (string) "%" . $request->search . "%")
                    ->latest("etudiants_cours.created_at")
                    ->get(),
            ]);
        }
        return view("historique", [
            "specialites" => Specialites::all(),
            "datas" => Etudiants_cours::join("materiels", function (JoinClause $join) {
                $join->on("materiels.etudiant_id", "=", "etudiants_cours.etudiants_id");
            })
                ->join("etudiants", "etudiants_cours.etudiants_id", "=", "etudiants.id")
                ->join("cours", "etudiants_cours.cours_id", "=", "cours.id")
                ->join("specialites", "specialites.id", "=", "etudiants.specialite_id")
                ->join("categories", "categories.id", "=", "materiels.categories_id")
                ->select("materiels.*", "etudiants.*", "cours.intitule as cours", "etudiants_cours.*", "categories.intitule as categorie")
                ->latest("etudiants_cours.created_at")
                ->get(),
        ]);

    }

    function update(Request $request): RedirectResponse
    {
        DB::select("update materiels set etat = 'Disponible' where libelle = ?", [$request->materiel]);

        return redirect()->back()->with("message", "{$request->materiel} restitué avec succès !");
    }
}
