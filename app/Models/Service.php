<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
  
    protected $fillable=[
        'serviceName',
        'description',
        'IsArchived',
        'image'
        ];
        public function setServiceNameAttribute($value){
            $this->attributes['serviceName']=strtolower($value);
        }
        public function getServiceNameAttribute($value){
            return ucwords($value);
        }
        public function setDescAttribute($value){
            $this->attributes['description']=strtolower($value);
        }
        public function getDescAttribute($value){
            return ucwords($value);
        }
           public function setIsArchived($value){
                $this->attributes['IsArchived']=( bool) ($value);
            }
            public function getIsArchived($value){
                return (bool) ($value);
        }
}
