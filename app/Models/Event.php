<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        "event_name",
        "date",
        "location",
        "description",
        "user_id",
    ];

    public static function store($request, $id = null)
    {
        $event = $request->only([
            "event_name",
            "date",
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
}