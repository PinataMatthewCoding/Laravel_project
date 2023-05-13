<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        "team_name",
        "member",
        "user_id",
    ];

    public static function store($request, $id = null)
    {
        $team = $request->only([
            "team_name",
            "member",
            "user_id",
        ]);
        // CONDITION
        if ($id) {
            $dataTeam = self::updateOrCreate(["id" => $id], $team);
        } else {
            $dataTeam = self::create($team);
            $id = $dataTeam->id;
        }
        return $dataTeam;
    }
    // RELATIONSHIP TABLE TEAM BOLOGN TO TABLE USER
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // RELATIONSHIP TABLE 
}