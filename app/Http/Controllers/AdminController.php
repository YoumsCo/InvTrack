<?php

namespace App\Http\Controllers;

use App\Http\Enum\Enum;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("admin.list", [
            "admins" => User::where("role", Enum::admin)->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("admin.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            "matricule" => ["required", "string", "unique:users"],
            "nom" => ["required", "string"],
            "telephone" => ["required", "integer", "regex:/^6(9|8|7|5|2)\d{7}$/"],
            "photo" => ["required", "file", "mimetypes:image/jpeg,image/png,image/jpg,image/webp"],
        ]);

        $credentials["nom"] = ucfirst(strtolower($credentials["nom"]));

        User::create([
            "matricule" => $credentials["matricule"],
            "nom" => $credentials["nom"],
            "telephone" => $credentials["telephone"],
            "password" => "1234",
            "photo" => $request->file("photo")->store("/admin", "public"),
            "role" => Enum::admin,
        ]);

        return redirect()->route("admin.index")->with("message", "Tâche effectuée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $user): View
    {
        return view("admin.edit", [
            "datas" => User::where("id", $user)->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $user): RedirectResponse
    {
        $photo = DB::select("select * from users where id = ?", [$user]);
        DB::delete("delete from users where id = ?", [$user]);

        Storage::disk("public")->delete($photo[0]->photo);
        return redirect()->back()->with("message", "Tâche effectuée avec succès");
    }
}
