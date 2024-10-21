<?php

namespace App\Http\Controllers;

use ApiResponse;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Traits\ApiResponse as TraitsApiResponse;
use App\Http\Controllers\uploadImage as ControllersUploadImage;
use projectService;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ProjectController extends Controller
{
  use TraitsApiResponse;
  use ControllersUploadImage;
 
  public function __construct( public projectService $service_project)
  {
      
  }
  public function index()
  {
      try {
        $projects= $this->service_project->get_project();
        
        return $this->successResponse( $projects,' all projects',200);
      }  catch (\Exception $th ) {
          $status=($th instanceof HttpException)? $th->getCode():500;
           return $this->errorResponse(
             message: $th->getMessage(),
             status:$status
           
           );   
          }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
      try{
     
      $project= $this->service_project->create_project($request);
      return $this->successResponse( $project,'the projects was created sucessfully',201);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }


  
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
      try{
          $project= $this->service_project->update_project($request,$id);

     ;
     return $this->successResponse( $project,'the projects was updated sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
  public function archive( $id)
  {
      try{
          $project= $this->service_project->archive_project($id);

     ;
     return $this->successResponse( $project,'sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
  public function unarchive( $id)
  {
      try{
          $project= $this->service_project->unarchive_project($id);

     ;
     return $this->successResponse( $project,'sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      try{
       
       $this->service_project->delet_project($id);
     return $this->successResponse( null,'the projects was deleted sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
}
