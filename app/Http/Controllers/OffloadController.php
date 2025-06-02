<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Etudiants;
use App\Models\Etudiants_cours;
use App\Models\Materiels;
use App\Models\Specialites;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function PHPUnit\Framework\isNumeric;

class OffloadController extends Controller
{
    function index(string $token): View
    {
        return view("offload", [
            "materiel" => $token,
            "delegues" => Etudiants::where("statut", "=", "Delegue")->get(),
            "vice_delegues" => Etudiants::where("statut", "Vice delegue")->get(),
            "specialites" => Specialites::all(),
        ]);
    }

    function offload(Request $request): RedirectResponse
    {
        if (DB::select("select libelle from materiels where libelle = ? and etat = 'Disponible'", [$request->materiel])) {
            /**
             * Second step
             */

            if ($request->ref === "second-step") {
                if (DB::select("select * from etudiants where nom = ? and statut = ?", [$request->nom, "Delegue"])) {
                    $datas = $request->validate([
                        "nom" => ["required", "string"],
                        "cours" => ["required", "regex:/^[a-zA-Z]{3,}\s?[a-zA-Z0-9]*\s?[a-zA-Z0-9]*$/"],
                        "debut" => ["required", "string"],
                        "fin" => ["required", "string"],
                    ]);

                    [$beginHour, $beginMin] = explode(":", $datas["debut"]);
                    [$endHour, $endMin] = explode(":", $datas["fin"]);

                    if (($beginHour > $endHour) || ($beginHour < 8) || ($endHour > 21)) {
                        return redirect()->back()->with("error", "Veuillez entrer des heures valides");
                    }

                    $etudiant = Etudiants::where("nom", $datas["nom"])
                        ->where("statut", "Delegue")
                        ->get();

                    Cours::create([
                        "intitule" => $datas["cours"],
                    ]);
                    sleep(1);
                    $cours = Cours::where("intitule", $datas["cours"])
                        ->get();

                    if (!isNumeric($etudiant[0]->id) || !isNumeric($cours[0]->id)) {
                        return redirect()->back()->with("error", "Une erreur s'est produite");
                    }

                    Etudiants_cours::create([
                        "etudiants_id" => $etudiant[0]->id,
                        "cours_id" => $cours[0]->id,
                    ]);
                    DB::select("update materiels set etat = ? where libelle = ?", ["Indisponible", $request->materiel]);

                    $time = $endHour - $beginHour;

                    return redirect()->route("home")->with("message", "{$request->materiel} doit être retourné dans {$time} heures.");
                }

                return redirect()->back()->with("error", "Délégué inexistant");
            }

            /**
             * Third step
             */

            if ($request->ref === "third-step") {
                if (DB::select("select * from etudiants where nom = ? and statut = ?", [$request->third_step_nom, "Vice delegue"])) {
                    $datas = $request->validate([
                        "third_step_nom" => ["required", "string"],
                        "third-step-cours" => ["required", "regex:/^[a-zA-Z]{3,}\s?[a-zA-Z0-9]*\s?[a-zA-Z0-9]*$/"],
                        "third-step-debut" => ["required", "string"],
                        "third-step-fin" => ["required", "string"],
                    ]);

                    [$beginHour, $beginMin] = explode(":", $datas["third-step-debut"]);
                    [$endHour, $endMin] = explode(":", $datas["third-step-fin"]);

                    if (($beginHour > $endHour) || ($beginHour < 8) || ($endHour > 21)) {
                        return redirect()->back()->with("error", "Veuillez entrer des heures valides");
                    }

                    $etudiant = Etudiants::where("nom", $datas["third_step_nom"])
                        ->where("statut", "Vice delegue")
                        ->get();

                    Cours::create([
                        "intitule" => $datas["third-step-cours"],
                    ]);
                    sleep(1);
                    $cours = Cours::where("intitule", $datas["third-step-cours"])
                        ->get();

                    if (!isNumeric($etudiant[0]->id) || !isNumeric($cours[0]->id)) {
                        return redirect()->back()->with("error", "Une erreur s'est produite");
                    }

                    Etudiants_cours::create([
                        "etudiants_id" => $etudiant[0]->id,
                        "cours_id" => $cours[0]->id,
                    ]);
                    DB::select("update materiels set etat = ? where libelle = ?", ["Indisponible", $request->materiel]);

                    $time = $endHour - $beginHour;

                    return redirect()->route("home")->with("message", "{$request->materiel} doit être retourné dans {$time} heures.");
                }

                return redirect()->back()->with("error", "Vice délégué inexistant");
            }

            /**
             * Fourth step
             */

            if ($request->ref === "fourth-step") {
                if (DB::select("select * from specialites where intitule = ?", [$request->fourth_step_specialite])) {
                    $datas = $request->validate([
                        "fourth-step-nom" => ["required", "string"],
                        "fourth-step-matricule" => ["required", "string", "unique:etudiants,matricule"],
                        "fourth_step_specialite" => ["required", "string", "exists:specialites,intitule"],
                        "fourth-step-niveau" => ["required", "integer", "between:1,5"],
                        "fourth-step-cours" => ["required", "regex:/^[a-zA-Z]{3,}\s?[a-zA-Z0-9]*\s?[a-zA-Z0-9]*$/"],
                        "fourth-step-debut" => ["required", "string"],
                        "fourth-step-fin" => ["required", "string"],
                    ]);

                    $datas["fourth-step-nom"] = ucfirst(strtolower($datas["fourth-step-nom"]));

                    [$beginHour, $beginMin] = explode(":", $datas["fourth-step-debut"]);
                    [$endHour, $endMin] = explode(":", $datas["fourth-step-fin"]);

                    if (($beginHour > $endHour) || ($beginHour < 8) || ($endHour > 21)) {
                        return redirect()->back()->with("error", "Veuillez entrer des heures valides");
                    }

                    $specialite = Specialites::where("intitule", $datas["fourth_step_specialite"])
                        ->get();

                    Etudiants::create([
                        "nom" => $datas["fourth-step-nom"],
                        "matricule" => $datas["fourth-step-matricule"],
                        "specialite_id" => $specialite[0]->id,
                        "responsable_id" => $specialite[0]->responsable_id,
                        "niveau" => $datas["fourth-step-niveau"],
                        "statut" => "Etudiant",
                    ]);

                    Cours::create([
                        "intitule" => $datas["fourth-step-cours"],
                    ]);

                    $etudiant = Etudiants::where("nom", $datas["fourth-step-nom"])
                        ->where("statut", "Etudiant")
                        ->get();

                    sleep(1);

                    $cours = Cours::where("intitule", $datas["fourth-step-cours"])
                        ->get();

                    if (!isNumeric($etudiant[0]->id) || !isNumeric($cours[0]->id)) {
                        return redirect()->back()->with("error", "Une erreur s'est produite");
                    }

                    Etudiants_cours::create([
                        "etudiants_id" => $etudiant[0]->id,
                        "cours_id" => $cours[0]->id,
                    ]);
                    DB::select("update materiels set etat = ? where libelle = ?", ["Indisponible", $request->materiel]);

                    $time = $endHour - $beginHour;

                    return redirect()->route("home")->with("message", "{$request->materiel} doit être retourné dans {$time} heures.");
                }
                return redirect()->back()->with("error", "Spécialité inexistante");
            }
            return redirect()->route('auth');

        }
        return redirect()->back()->with("error", "Matériel inexistant");
    }
}
