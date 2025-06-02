<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    function index(): View
    {
        return view("auth");
    }

    function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            "nom" => "required",
            "password" => "required",
        ]);

        $credentials["nom"] = ucfirst(strtolower($credentials["nom"]));

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', "Bon retour " . Auth::user()->nom);
        }

        return redirect()->back()->with("error", "Identifiants : { " . $credentials["nom"] . ", " . $credentials["password"] . " } invalides");
    }
}
