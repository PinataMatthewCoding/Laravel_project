<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        "event_name",
        "start_date",
        "end_date",
        "location",
        "description",
        "user_id",
    ];

    public static function store($request, $id = null)
    {
        $event = $request->only([
            "event_name",
            "date",
            "start_date",
            "end_date",
            "location",
            "description",
            "user_id",
        ]);
        // CONDITION
        if ($id) {
            $dataEvent = self::updateOrCreate(["id" => $id], $event);
        } else {
            $dataEvent = self::create($event);
            $id = $dataEvent->id;
        }
        return $dataEvent;
    }
    
    // RELATIONSHIP TABLE EVENT BELOGNSTO TABLE USER
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // MANY TO MANY BETWEEN EVENT AND TEAM
    public function teams(){
        return  $this->belongsToMany(Team::class, "event_teams");
    } 

    // RELATIONSHIP 1 EVENT HAS MANY TICKET
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}