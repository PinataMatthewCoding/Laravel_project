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
            "gender"=>$this->gender,
            "created-by"=>$this->user,
            // WANT TO SEE CREATED_BY AND EVENT IN TEAM TABLE
            "created_by"=>$this->user,
            "event"=>$this->events,
        ];
    }
}
