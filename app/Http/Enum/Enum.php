<?php

namespace App\Http\Enum;

enum Enum: string
{
    case technicien = "Technicien superieur";
    case ingenieur = "Ingenieur";
    case docteur = "Docteur";
    case professeur = "Professeur";
    case superAdmin = "Super admin";
    case admin = "Admin";
    case admin_password = "1234";
}