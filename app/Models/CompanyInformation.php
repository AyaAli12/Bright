<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    use HasFactory;
    protected $fillable=[
        'companyName',
        'detalis',
        'logo',
        'IsArchived'
        ];
        public function setcompanyNameAttribute($value){
            $this->attributes['companyName']=strtolower($value);
        }
        public function getcompanyNameAttribute($value){
            return ucwords($value);
        }
        public function setdetalisAttribute($value){
            $this->attributes['detalis']=strtolower($value);
        }
        public function getdetalisAttribute($value){
            return ucwords($value);
        }
            public function setIsArchived($value){
                $this->attributes['IsArchived']=( bool) ($value);
            }
            public function getIsArchived($value){
                return (bool) ($value);
        }
}
