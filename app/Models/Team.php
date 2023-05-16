<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        "team_name",
        "member",
        "gender",
        "created_by",
    ];

    public static function store($request, $id = null)
    {
        $team = $request->only([
            "team_name",
            "member",
            "gender",
            "created_by",
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
    // RELATIONSHIP TABLE TEAM BELOGN TO TABLE USER
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    // RELATIONSHIP TABLE TEAM BELONG TO TABLE EVENT
    public function events(){
        return  $this->belongsToMany(Event::class, "event_teams");
    } 
}