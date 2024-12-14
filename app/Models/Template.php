<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table = 'template'; // Nom exact de la table

    protected $fillable = [
        'name',
        'filePath',
    ];

    /**
     * Get the user input associated with the template.
     */

}
