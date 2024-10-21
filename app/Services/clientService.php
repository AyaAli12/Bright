<?php

namespace App\Services;

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\uploadImage;
use App\Models\Client;

use uploadImage as GlobalUploadImage;

class clientService{
use uploadImage;
public function get_client(){
    try {
        //code...
        $clients=Client::all();
        return $clients;
    } catch (\Exception $th) {
        throw $th;
     
    }
}

public function archive_client($id){
    try{
    $client=Client::find($id);
    if($client){

    $client->update([
        'IsArchived'=>true
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
public function unarchive_client($id){
    try{
    $client=Client::find($id);
    if($client){

    $client->update([
        'IsArchived'=>false
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
    public function create_client($request){
    try {
      
        $clients= Client::create([
        "clientName"=>$request->clientName,        
          "IsArchived"=>$request->IsArchived,
          
       ]);
       if ($request->hasFile('image')) {
        $this->uploadImage($request, 'image', $clients, 'clients');
    } 
  
        return $clients;
    } 
    catch (\Exception $th) {
        throw $th;
     
    }
    }
    public function update_client($request,$id){
    try {
        //code...
        $clients= Client::where('id',$id)->update([
            "clientName"=>$request->clientName,        
            "IsArchived"=>$request->IsArchived,
           
           ]);
           if ($request->hasFile('image')) {
            $this->uploadImage($request, 'image', $clients, 'clients');
        } 
       
           
            return $clients;
      
    } catch (\Exception $th) {
        throw $th;
     
    }
}
    public function delet_client($id){
        try {
            $client=Client::where('id',$id)->first();
           if(!$client){
            throw new ModelNotFoundException('client');
    
           }
           $client->delete();
        } catch (\Exception $th) {
            throw $th;
         
        }
    
}
};
