<?php

use App\Exceptions\ModelNotFoundException;
use App\Http\Controllers\uploadImage;
use App\Models\Project;

class projectService{
use uploadImage;
public function get_project(){
   

    try {
        //code...
        $projects=Project::all();
        return $projects;
    } catch (\Exception $th) {
        throw $th;
     
    }
}

public function archive_project($id){
    try{
    $project=Project::find($id);
    if($project){

    $project->update([
        'IsArchived'=>true
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
public function unarchive_project($id){
    try{
    $project=Project::find($id);
    if($project){

    $project->update([
        'IsArchived'=>false
    ]);
} 
    } catch (\Exception $th) {
    throw $th;
 
}
}
    public function create_project($request){
    try {
      
        $projects= Project::create([
        "ProjectName"=>$request->ProjectName,        
          "description"=>$request->description,
           "IsArchived"=>$request->IsArchived,
           "image"=>$request->image,
       ]);
       if ($request->hasFile('image')) {
        $this->uploadImage($request, 'image', $projects, 'projects');
    } 
    else {
       
        $projects->save();
    }
       
      
        return $projects;
    } 
    catch (\Exception $th) {
        throw $th;
     
    }
    }
    public function update_project($request,$id){
    try {
        //code...
        $projects= Project::where('id',$id)->update([
            "ProjectName"=>$request->ProjectName,        
          "description"=>$request->description,
           "IsArchived"=>$request->IsArchived,       
    
           ]);
           if ($request->hasFile('image')) {
            $this->uploadImage($request, 'image', $projects, 'projects');
        } 
      
            return $projects;
      
    } catch (\Exception $th) {
        throw $th;
     
    }
}
    public function delet_project($id){
        try {
            $project=Project::where('id',$id)->first();
           if(!$project){
            throw new ModelNotFoundException('project');
    
           }
           $project->delete();
        } catch (\Exception $th) {
            throw $th;
         
        }

}
}