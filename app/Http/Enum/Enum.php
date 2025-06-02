<?php

namespace App\Http\Enum;

enum Enum: string
{
    case technicien = "Technicien superieur";
    case ingenieur = "Ingenieur";
    case docteur = "Docteur";
    case professeur = "Professeur";
    case admin = "admin";
    case superAdmin = "Super admin";
}