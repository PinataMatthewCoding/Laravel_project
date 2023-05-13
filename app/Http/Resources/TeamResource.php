<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "team_name"=>$this->team_name,
            "member"=>$this->member,
            "team_id"=>$this->teams,
            "created_by"=>$this->user,
            "event"=>$this->events,
        ];
    }
}
