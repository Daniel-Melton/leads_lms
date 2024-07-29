<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'country',
        'time_zone',
        'gender',
        'email',
        'phone',
        'status_id',
        'source',
        'agent_id',
        'reminder_at',
        'note'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}