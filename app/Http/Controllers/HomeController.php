<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Materiels;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeController extends Controller
{

    // function index(Request $request): View
    // {
    //     if ($request->action === "search" && $request->page === "home") {
    //         return view("home", [
    //             "categories" => Categories::all(),
    //             "sante" => null,
    //             "informatique" => null,
    //             "technique" => null,
    //             "autre" => null,
    //             "searchResults" => Materiels::where("libelle", "LIKE", (string) "%" . $request->search . "%")->get(),
    //             "searchResultsCount" => Materiels::where("libelle", "LIKE", (string) "%" . $request->search . "%")->count(),
    //         ]);
    //     }
    //     if ($request->action === "filter" && $request->page === "home") {
    //         return view("home", [
    //             "categories" => Categories::all(),
    //             "sante" => null,
    //             "informatique" => null,
    //             "technique" => null,
    //             "autre" => null,
    //             "searchResults" => Materiels::join("categories", "categories.id", "=", "materiels.categories_id")
    //                 ->where("categories.intitule", $request->search)
    //                 ->get()
    //         ]);
    //     }

    //     return view("home", [
    //         "categories" => Categories::all(),
    //         "sante" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Sante")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->get(),
    //         "santeCount" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Sante")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->count(),
    //         "informatique" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Informatique")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->get(),
    //         "informatiqueCount" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Informatique")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->count(),
    //         "technique" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Technique")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->get(),
    //         "techniqueCount" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Technique")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->count(),
    //         "autre" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Autre")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })->get(),
    //         "autreCount" => Materiels::join("categories", function (JoinClause $join) {
    //             $join->on("materiels.categories_id", "categories.id")
    //                 ->where("categories.intitule", "Autre")
    //                 ->where("materiels.etat", "Disponible")
    //             ;
    //         })
    //             ->count(),
    //         "searchResults" => null,
    //     ]);
    // }


    function index(Request $request): View
    {
        if ($request->action === "search" && $request->page === "home") {
            return view("home", [
                "categories" => Categories::all(),
                "materiels" => Materiels::where("etat", "Disponible")->latest()->get(),
                "searchs" => Materiels::join("categories", function (JoinClause $join) use ($request) {
                    $join->on("categories.id", "=", "materiels.categories_id")
                        ->where("categories.intitule", "like", (string) "%" . $request->search . "%")
                        ->orWhere("materiels.libelle", "like", (string) "%" . $request->search . "%");
                })->get(),
            ]);
        }
        if ($request->action === "filter" && $request->page === "home") {
            return view("home", [
                "categories" => Categories::all(),
                "materiels" => Materiels::where("etat", "Disponible")->latest()->get(),
                "searchs" => Materiels::join("categories", function (JoinClause $join) use ($request) {
                    $join->on("categories.id", "=", "materiels.categories_id")
                        ->where("categories.intitule", "like", (string) "%" . $request->search . "%");
                })->get(),
            ]);
        }

        return view("home", [
            "categories" => Categories::all(),
            "materiels" => Materiels::where("etat", "Disponible")->latest()->get(),
            "searchs" => null,
        ]);
    }

}
