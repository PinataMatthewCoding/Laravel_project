<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            "zone"=>$this->zone,
            "price"=>$this->price,
            // WANT TO SEE EVETN AND BUY_TICKET IN TICKET TABLE
            "event_id"=>$this->event,
            "buy_ticket"=>$this->users,
        ];
    }
}
