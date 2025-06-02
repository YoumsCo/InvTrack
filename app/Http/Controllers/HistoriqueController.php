<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HistoriqueController extends Controller
{
    function index(): View
    {
        return view("historique");
    }
}
