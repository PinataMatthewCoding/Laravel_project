<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            "event_name"=>$this->event_name,
            "start_date"=>$this->start_date,
            "end_date"=>$this->end_date,
            "location"=>$this->location,
            "description"=>$this->description,
            "created_by"=>$this->user,
            "team"=>$this->teams,
        ];
    }
}