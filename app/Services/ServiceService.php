<?php
namespace App\Services;

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\uploadImage;
use App\Models\Service;
use uploadImage as GlobalUploadImage;

class ServiceService{
use uploadImage;
public function get_services(){
    try {
        //code...
        $services=Service::all();
        return $services;
    } catch (\Exception $th) {
        throw $th;
     
    }
}
public function archive_service($id){
    try{
    $service=Service::find($id);
    if($service){

    $service->update([
        'IsArchived'=>true
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
public function unarchive_service($id){
    try{
    $service=Service::find($id);
    if($service){

    $service->update([
        'IsArchived'=>false
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}

    public function create_service($request){
    try {
      
        $services= Service::create([
        "serviceName"=>$request->serviceName,
          "description"=>$request->description,
          "IsArchived"=>$request->IsArchived,
        
       ]);
       if ($request->hasFile('image')) {
        $this->uploadImage($request, 'image', $services, 'services');
    } 
   
        return $services;
    } 
    catch (\Exception $th) {
        throw $th;
     
    }
    }
    public function update_service($request,$id){
    try {
        //code...
       
            $services= Service::where('id',$id)->update([
                "serviceName"=>$request->serviceName,
                "description"=>$request->description,
                "IsArchived"=>$request->IsArchived,
                 "image"=>$request->image,
     
            ]);
            if ($request->hasFile('image')) {
                $this->uploadImage($request, 'image', $services, 'services');
            } 
          
                return $services;
            } 
      
     catch (\Exception $th) {
        throw $th;
     
    }
}
    public function delet_services($id){
        try {
            $service=Service::where('id',$id)->first();
           if(!$service){
            throw new ModelNotFoundException('service');
    
           }
           $service->delete();
        } catch (\Exception $th) {
            throw $th;
         
        }
}
};
