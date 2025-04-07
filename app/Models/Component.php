<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $table = 'component';

    protected $fillable = [
        'name',
        'htmlStructure',
        'cssStyle',
        'img_path',
        'type_id',
    ];

    /**
     * Get the type associated with the component.
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
