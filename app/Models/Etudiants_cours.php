<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiants_cours extends Model
{
    use HasFactory;

    protected $fillable = [
        "etudiants_id",
        "cours_id",
        "debut",
        "fin",
        "duree",
    ];
}
