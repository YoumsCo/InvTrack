<?php

namespace App\Http\Controllers;

use App\Models\Responsables;
use App\Models\Specialites;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request->search && $request->action == "search" && $request->page == "responsable_list") {
            return view("responsable.list", [
                "responsables" => Responsables::where("matricule", "like", (string) "%" . $request->search . "%")
                    ->orWhere("nom", "like", (string) "%" . $request->search . "%")
                    ->orWhere("prenom", "like", (string) "%" . $request->search . "%")
                    ->orWhere("telephone", "like", (string) "%" . $request->search . "%")
                    ->orWhere("specialisation", "like", (string) "%" . $request->search . "%")
                    ->orWhere("titre", "like", (string) "%" . $request->search . "%")
                    ->simplePaginate(5),
                "specialites" => Specialites::all(),
                "count" => 0,
            ]);
        }
        return view("responsable.list", [
            "responsables" => Responsables::latest()->simplePaginate(5),
            "specialites" => Specialites::all(),
            "count" => 0,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): vIew
    {
        return view("responsable.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "matricule" => ["required", "string", "unique:responsables"],
            "nom" => ["required", "string"],
            "prenom" => ["required", "string"],
            "telephone" => ["required", "regex:/^6(9|8|7|5|2)\d{7}$/"],
            "specialisation" => ["required", "string"],
            "titre" => ["required", "string"],
        ]);
        $credentials["nom"] = ucfirst(strtolower($credentials["nom"]));
        $credentials["prenom"] = ucfirst(strtolower($credentials["prenom"]));
        $credentials["specialisation"] = ucfirst(strtolower($credentials["specialisation"]));
        $credentials["titre"] = ucfirst(strtolower($credentials["titre"]));

        Responsables::create($credentials);

        return redirect()->route("responsable.index")->with("message", "Insertion effectuée");
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsables $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsables $responsable): view
    {
        return view("responsable.edit", [
            "datas" => $responsable
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsables $responsable): RedirectResponse
    {
        $credentials = $request->validate([
            "nom" => ["required", "string"],
            "prenom" => ["required", "string"],
            "tel" => ["required", "regex:/^6(9|8|7|5|2)\d{7}$/"],
            "specialisation" => ["required", "string"],
            "titre" => ["required", "string"],
        ]);
        $credentials["nom"] = ucfirst(strtolower($credentials["nom"]));
        $credentials["prenom"] = ucfirst(strtolower($credentials["prenom"]));
        $credentials["specialisation"] = ucfirst(strtolower($credentials["specialisation"]));
        $credentials["titre"] = ucfirst(strtolower($credentials["titre"]));

        Responsables::find($responsable->id)->update(array_merge(Responsables::find($responsable->id)->toArray(), $credentials));

        return redirect()->route("responsable.index")->with("message", "Modifications effectuées");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsables $responsable): RedirectResponse
    {
        Responsables::find($responsable->id)->destroy($responsable->id);
        return redirect()->route("responsable.index")->with("message", "Suppression effectuée");
    }
}
