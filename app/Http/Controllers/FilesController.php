<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public static function img(): array
    {
        $images = Storage::disk("public")->files("/");
        $tab = [];

        foreach ($images as $img) {
            if ($img !== "." && $img !== ".." && $img != ".gitignore") {
                array_push($tab, $img);
            }
        }
        return $tab;
    }
}
