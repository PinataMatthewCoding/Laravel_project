<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTicketResource extends JsonResource
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
            // WANT TO SEE BUY_TICKET NAD EVENT IN TICKET TABLE
            "event_id"=>$this->event,
            "buy_ticket"=>$this->users,
        ];
    }
}
