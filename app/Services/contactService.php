<?php

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\uploadImage;
use App\Models\Contact;
use App\Traits\ApiResponse;

class contactService{
    use uploadImage;
    use ApiResponse;
public function get_contact(){
    try {
        //code...
        $contacts=Contact::all();
        return $contacts;
    } catch (\Exception $th) {
        throw $th;
     
    }
}
public function get_unArchived_contact(){
    try{
    $contact=Contact::where('IsArchived',false)->get();
    if($contact){
        return $contact;
    }    } catch (\Exception $th) {
        throw $th;
    }

}
public function archive_contact($id){
    try{
    $contact=Contact::find($id);
    if($contact){

    $contact->update([
        'IsArchived'=>true
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
public function unarchive_contact($id){
    try{
    $contact=Contact::find($id);
    if($contact){

    $contact->update([
        'IsArchived'=>false
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
    public function create_contact($request){
    try {
      
        $contacts= Contact::create([
        "email"=>$request->email,        
          "IsArchived"=>$request->IsArchived,
           "phoneNumber"=>$request->phoneNumber,
       ]);
        return $contacts;
    } 
    catch (\Exception $th) {
        throw $th;
     
    }
    }
    public function update_contact($request,$id){
    try {
        //code...
        $contacts= Contact::where('id',$id)->update([
            "email"=>$request->email,        
          "IsArchived"=>$request->IsArchived,
           "phoneNumber"=>$request->phoneNumber,
    
           ]);
       return $contacts;
    } catch (\Exception $th) {
        throw $th;
     
    }
}
    public function delet_contact($id){
        try {
            $contact=Contact::where('id',$id)->first();
           if(!$contact){
            throw new ModelNotFoundException('contact');
    
           }
           $contact->delete();
        } catch (\Exception $th) {
            throw $th;
         
        }
    

}
}

