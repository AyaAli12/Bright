<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
   protected $fillable=[
    'ProjectName',
    'description',
    'IsArchived',
    'image'
    ];
    public function setProjectNameAttribute($value){
        $this->attributes['ProjectName']=strtolower($value);
    }
    public function getProjectNameAttribute($value){
        return ucwords($value);
    }
    public function setdescAttribute($value){
        $this->attributes['description']=strtolower($value);
    }
    public function getdescAttribute($value){
        return ucwords($value);
    }
        public function setIsArchived($value){
            $this->attributes['IsArchived']=( bool) ($value);
        }
        public function getIsArchived($value){
            return (bool) ($value);
    }
    
}
