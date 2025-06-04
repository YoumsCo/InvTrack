<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiels extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "etudiant_id",
        "categories_id",
        "matricule",
        "libelle",
        "etat",
        "image",
    ];
}
