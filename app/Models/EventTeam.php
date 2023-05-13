<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        "event_id",
        "team_id",
    ];
}