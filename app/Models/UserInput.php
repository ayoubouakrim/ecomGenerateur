<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInput extends Model
{
    use HasFactory;
    protected $table = 'user_input'; // Nom exact de la table

    protected $fillable = [
        'siteName',
        'description',
        'logoUrl',
        'faveIcon',
        'color1',
        'color2',
        'color3',
        'template_id',
        'user_id',
    ];

    public function template()
    {
        return $this->hasOne(Template::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
