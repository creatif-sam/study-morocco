<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Institution extends Model
{
    use HasFactory;

  protected $fillable = [
    'name',
    'slug',
    'city',
    'location',
    'type',
    'website',
    'is_active',
];


    // Automatically set slug when creating
    protected static function booted()
    {
        static::creating(function ($institution) {
            if (empty($institution->slug)) {
                $institution->slug = Str::slug($institution->name);
            }
        });

        static::updating(function ($institution) {
            if (empty($institution->slug)) {
                $institution->slug = Str::slug($institution->name);
            }
        });
    }
}
