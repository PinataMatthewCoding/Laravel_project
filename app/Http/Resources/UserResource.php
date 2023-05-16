<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            "id"=>$this->id,
            "name"=>$this->name,
            "gender"=>$this->gender,
            "email"=>$this->email,
            "password"=>$this->password,
            "phone_number"=>$this->phone_number,
            "province"=>$this->province,
            // WANT TO SEE TICKET, EVENT, AND TEAM IN USER TABLE
            "tickets"=>$this->tickets,
            "events"=>$this->events,
            "teams"=>$this->teams,
        ];
    }
}
