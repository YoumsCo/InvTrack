<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    use HasFactory;

    protected $fillable = [
        "responsable_id",
        "specialite_id",
        "matricule",
        "nom",
        "prenom",
        "date_naissance",
        "lieu",
        "redoublant",
        "niveau",
        "statut",
    ];
}
