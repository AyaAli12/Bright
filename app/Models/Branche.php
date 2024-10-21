<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;
    protected $fillable=[
  'location',
  'dateOfEstablich'
    ];
    public function contact(){
         return $this->belongsTo(Contact::class);
    }
    public function setlocationAttribute($value){
        $this->attributes['location']=strtolower($value);
    }
    public function getlocationAttribute($value){
        return ucwords($value);
    }
    public function getdateOfEstablichAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
            }
}
