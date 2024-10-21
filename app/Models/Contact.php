<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'phoneNumber',
        'IsArchived'
        ];
        public function branches(): HasMany
        {
      return $this->hasMany(Branche::class);

        }
        public function setemailAttribute($value){
            $this->attributes['ProjectName']=strtolower($value);
        }
        public function getemailAttribute($value){
            return ucwords($value);
        }
        public function getPhoneNumberAttribute($value)
        {
            return preg_replace('/\D/', '', $value); 
        }
    
        public function setPhoneNumberAttribute($value)
        {
            $this->attributes['phoneNumber'] = preg_replace('/\D/', '', $value); 
        }
            public function setIsArchived($value){
                $this->attributes['IsArchived']=( bool) ($value);
            }
            public function getIsArchived($value){
                return (bool) ($value);
        }

}
