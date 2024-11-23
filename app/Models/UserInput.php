<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInput extends Model
{
    use HasFactory;
    protected $table = 'userinput'; // Nom exact de la table

    protected $fillable = [
        'siteName',
        'description',
        'logoUrl',
        'faveIcon',
        'color1',
        'color2',
        'color3',
        'template_id',
    ];

    public function template()
    {
        return $this->hasOne(Template::class);
    }
}
