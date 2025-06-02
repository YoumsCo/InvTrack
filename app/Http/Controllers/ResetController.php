<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ResetController extends Controller
{
    function index(): View
    {
        return view("reset");
    }

    function resetPassword(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            "matricule" => ["required"],
            "password" => ["required"],
            "confirm-password" => ["required"],
        ]);


        if ($credentials["password"] !== $credentials["confirm-password"]) {
            return redirect()->back()->with("error", "La confirmation ne correspond pas au mot de passe entré");
        }

        if (User::where("matricule", $credentials["matricule"])->exists()) {
            $id = DB::table('users')->where("matricule", $credentials["matricule"])->value("id");

            if (User::find($id)->update(array_merge(User::find($id)->toArray(), $credentials))) {
                return redirect()->route("auth")->with("message", "Mot de passe modifié");
            }

            return redirect()->back()->with("error", "Matricule invalide");
        }
        return redirect()->back()->with("error", "Matricule invalide");
    }
}
