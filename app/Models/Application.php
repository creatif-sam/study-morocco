<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_no',
        'user_id',
        'program_id',
        'intake_id',
        'assigned_agent_id',
        'status',
        'remarks',
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function intake()
    {
        return $this->belongsTo(Intake::class);
    }

    public function agent()
    {
        // Assigned agent is also a User
        return $this->belongsTo(User::class, 'assigned_agent_id');
    }
}
