<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_id',
        'content'
    ];

    // Relation avec le template original
    public function original()
    {
        return $this->belongsTo(Template::class, 'original_id');
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
