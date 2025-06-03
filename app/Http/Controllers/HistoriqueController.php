<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Cours;
use App\Models\Etudiants;
use App\Models\Etudiants_cours;
use App\Models\Materiels;
use App\Models\Specialites;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HistoriqueController extends Controller
{
    function index(): View
    {
        return view("historique", [
            "specialites" => Specialites::all(),
            "datas" => Etudiants_cours::join("materiels", function (JoinClause $join) {
                $join->on("materiels.etudiant_id", "=", "etudiants_cours.etudiants_id")
                    ->where("materiels.etat", "Indisponible");
            })
                ->join("etudiants", "etudiants_cours.etudiants_id", "=", "etudiants.id")
                ->join("cours", "etudiants_cours.cours_id", "=", "cours.id")
                ->join("specialites", "specialites.id", "=", "etudiants.specialite_id")
                ->get(),
        ]);
    }
}
