<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
  protected $fillable=[
'clientName',
'IsArchived',
'Logo'
  ];
  public function setclientNameAttribute($value){
    $this->attributes['clientName']=strtolower($value);
}
public function getclientNameAttribute($value){
    return ucwords($value);
}

    public function setIsArchived($value){
        $this->attributes['IsArchived']=( bool) ($value);
    }
    public function getIsArchived($value){
        return (bool) ($value);
}
 
}
