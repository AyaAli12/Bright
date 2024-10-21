<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
    public function toArray(Request $request): array
    {
        return[
        'companyName'=>$this->companyName,
        'detalis'=>$this->detalis,
        'logo'=>$this->logo,
        'IsArchived'=>$this->IsArchived
        ];
    }
}
