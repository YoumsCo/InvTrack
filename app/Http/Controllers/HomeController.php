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
                        ->where("categories.intitule", "like", (string) "%" . $request->search . "%")
                        ->where("materiels.etat", "=", "Disponible");
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
