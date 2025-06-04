<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Materiels;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request->search) {
            return view("materiel.list", [
                "materiels" => Materiels::join("categories", "categories.id", "=", "materiels.categories_id")
                    ->where("materiels.libelle", "like", (string) "%" . $request->search . "%")
                    ->orWhere("materiels.etat", "like", (string) "%" . $request->search . "%")
                    ->orWhere("materiels.matricule", "like", (string) "%" . $request->search . "%")
                    ->orWhere("categories.intitule", "like", (string) "%" . $request->search . "%")
                    ->select("materiels.*", "categories.intitule as categorie")
                    ->latest()
                    ->simplePaginate(5),
            ]);
        }
        return view("materiel.list", [
            "materiels" => Materiels::join("categories", "categories.id", "=", "materiels.categories_id")
                ->select("materiels.*", "categories.intitule as categorie")
                ->latest()
                ->simplePaginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("materiel.add", [
            "categories" => Categories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $datas = $request->validate([
            "matricule" => ["required", "string", "unique:materiels,matricule"],
            "nom" => ["required", "string"],
            "categorie" => ["required", "string", "exists:categories,intitule"],
            "image" => ["required", "file", "mimetypes:image/jpg,image/jpeg,image/png"],
        ]);

        $categories = Categories::where("intitule", $datas["categorie"]);

        Materiels::create([
            "categories_id" => $categories->first()->id,
            "matricule" => $datas["matricule"],
            "libelle" => $datas["nom"],
            "etat" => "Disponible",
            "image" => $request->file("image")->store("/", "public"),
        ]);

        return redirect()->route("materiel.index")->with("message", "Ajout effectué");
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiels $materiels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiels $materiels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materiels $materiel): RedirectResponse
    {
        Materiels::find($materiel->id)
            ->update(array_merge(Materiels::find($materiel->id)->toArray(), [
                "etat" => $request->etat,
            ]));

        return redirect()->back()->with("message", "Mis à jour effectuée");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiels $materiel): RedirectResponse
    {
        Materiels::find($materiel->id)->delete(Materiels::find($materiel->id));
        Storage::disk("public")->delete($materiel->image);
        return redirect()->back()->with("message", "Supprésion effectuée");
    }
}
