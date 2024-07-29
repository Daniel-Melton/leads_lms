<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}