<?php

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\uploadImage;
use App\Models\CompanyInformation;

class companyService{
    use uploadImage;
    public function get_company(){
        try {
            //code...
            $companies=CompanyInformation::all();
            return $companies;
        } catch (\Exception $th) {
            throw $th;
         
        }
    }
 
    public function archive_company($id){
        try{
        $company=CompanyInformation::find($id);
        if($company){

        $company->update([
            'IsArchived'=>true
        ]);
    } 
        } catch (\Exception $th) {
        throw $th;
     
    }
}
    public function unarchive_company($id){
        try{
        $company=CompanyInformation::find($id);
        if($company){

        $company->update([
            'IsArchived'=>false
        ]);
    } 
        } catch (\Exception $th) {
        throw $th;
     
    }
}
        public function create_company($request){
        try {
          
            $companies= CompanyInformation::create([
            "companyName"=>$request->companyName,               
              "detalis"=>$request->detalis,            
               "IsArchived"=>$request->IsArchived,
           ]);
           if ($request->hasFile('image')) {
            $this->uploadImage($request, 'image', $companies, 'companies');
        } 
       
       return $companies;
            
        } 
        catch (\Exception $th) {
            throw $th;
         
        }
        }
        public function update_company($request,$id){
        try {
            //code...
            $companies= CompanyInformation::where('id',$id)->update([
                "companyName"=>$request->companyName,               
              "detalis"=>$request->detalis,              
               "IsArchived"=>$request->IsArchived,
        
               ]);
               if ($request->hasFile('image')) {
                $this->uploadImage($request, 'image', $companies, 'companies');
            } 
          
           return $companies;
        } catch (\Exception $th) {
            throw $th;
         
        }
    }
        public function delet_company($id){
            try {
                $company=CompanyInformation::where('id',$id)->first();
               if(!$company){
                throw new ModelNotFoundException('company');
        
               }
               $company->delete();
            } catch (\Exception $th) {
                throw $th;
             
            }
        
    
    }
    };
    
