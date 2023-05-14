<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        "zone",
        "price",
        "user_id",
        "event_id",
    ];

    public static function store($request, $id = null)
    {
        $ticket = $request->only([
            "zone",
            "price",
            "user_id",
            "event_id",
        ]);
        // CONDITION
        if ($id) {
            $dataTicket = self::updateOrCreate(["id" => $id], $ticket);
        } else {
            $dataTicket = self::create($ticket);
            $id = $dataTicket->id;
        }
        return $dataTicket;
    }

    // RELATIONSHIP TABLE TICKET BELOGNSTO TABLE USER
    public function tickets(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // RELATIONSHIP TABLE TICKET BELONGSTO TABLE EVENT
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}