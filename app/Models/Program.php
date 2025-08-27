<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'institution_id',
        'level',
        'title',
        'language',
        'tuition',
        'duration',
        'slug',
        'is_active',
        'requirements',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
