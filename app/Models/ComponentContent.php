<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'component_id',
        'userInput_id',
    ];

    
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    
    public function userInput()
    {
        return $this->belongsTo(UserInput::class);
    }
}
