<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'serviceName'=> $this->serviceName,
            'description'=> $this->description,
            'IsArchived'=>$this->IsArchived,
            'image'=>$this->image
                 ];
    }
}
