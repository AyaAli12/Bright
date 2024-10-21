<?php

use App\Http\Resources\BrancheResource;
use App\Models\Branche;
use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use uploadImage;

class brancheService{
       protected function check_contact($id){
       
            $contact=Contact::where('id', $id)->get();
            if (!$contact) {
              throw new ModelNotFoundException('Contact');
           
          
            }
            return $contact;
       }


       public function archive_branche($id){
        try{
        $branche=Branche::find($id);
        if($branche){

        $branche->update([
            'IsArchived'=>true
        ]);
    } 
        } catch (\Exception $th) {
        throw $th;
     
    }
}
       public function unarchive_branche($id){
        try{
        $branche=Branche::find($id);
        if($branche){

        $branche->update([
            'IsArchived'=>false
        ]);
    } 
        } catch (\Exception $th) {
        throw $th;
     
    }
}
    
public function get_branche($id){
    try {
        
        $contact = $this->check_contact($id);
        $branches=BrancheResource::collection($contact->branches()->get());
        return $branches;
    } catch (\Exception $th) {
        throw $th;
     
    }
}
    public function create_branche($request,$id){
    try {
        $contact = $this->check_contact($id);
        $branches= $contact->branches()->create([
          "location"=>$request->location,        
          "dateOfEstablich"=>$request->dateOfEstablich,
          "IsArchived"=>$request->IsArchived,
           "contact_id"=>$request->contact_id,
       ]);
        return $branches;
    } 
    catch (\Exception $th) {
        throw $th;
     
    }
    }
    public function update_branche($request,$id){
    try {
       
        $branche=Branche::where('id', $id)->get();
        $branches= $branche->update([
            "location"=>$request->location,        
            "dateOfEstablich"=>$request->dateOfEstablich,
            "IsArchived"=>$request->IsArchived,
             "contact_id"=>$request->contact_id,
    
           ]);
       return $branches;
    } catch (\Exception $th) {
        throw $th;
     
    }
}
    public function delet_branche($id):void{
    try {
        $branch=Branche::where('id',$id)->first();
       if(!$branch){
        throw new ModelNotFoundException('branch');

       }
       $branch->delete();
    } catch (\Exception $th) {
        throw $th;
     
    }

}
}
