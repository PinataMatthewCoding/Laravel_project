<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowUserResource extends JsonResource
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
            "name"=>$this->name,
            "gender"=>$this->gender,
            "email"=>$this->email,
            "password"=>$this->password ?? null,
            "age"=>$this->age ?? null,
            "phone_number"=>$this->phone_number ?? null,
            "province"=>$this->province ?? null,
            "events"=>$this->events,
        ];
    }
}