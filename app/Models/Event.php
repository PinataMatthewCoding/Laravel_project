<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        "event_name",
        "date",
        "location",
        "description",
    ];

    public static function store($request, $id = null)
    {
        $event = $request->only([
            "event_name",
            "date",
            "location",
            "description",
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
}