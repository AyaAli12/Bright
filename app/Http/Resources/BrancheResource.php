<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrancheResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   
    public function toArray(Request $request): array
    {
        return[
   'id'=>$this->id,
   'Location'=> $this->Location,
   'dateOfEstablish'=> $this->dateOfEstablish,
   'email'=>$this->Contact->email,
   'phoneNumber'=>$this->Contact->phoneNumber
        ];
    }
}
