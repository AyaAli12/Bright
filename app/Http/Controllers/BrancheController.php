<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrancheResource;
use App\Models\Branche;
use App\Models\Contact;
use brancheService;
use Illuminate\Http\Request;
use App\Traits\ApiResponse as TraitsApiResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BrancheController extends Controller
{
    use TraitsApiResponse; 
  public function __construct( public brancheService $service_branche)
  {
      
  }
  public function index($id)
  {
      try {
        $branches= $this->service_branche->get_branche($id);
        
        return $this->successResponse( $branches,' all branches',200);
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
  public function store(Request $request , $id)
  {
      try{
     
      $branche= $this->service_branche->create_branche($request,$id);
      return $this->successResponse( $branche,'the branches was created sucessfully',201);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }

  public function update(Request $request, string $id)
  {
      try{
          $branche= $this->service_branche->update_branche($request,$id);

     ;
     return $this->successResponse( $branche,'the branches was updated sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
  public function archive(string $id)
  {
      try{
          $branche= $this->service_branche->archive_branche($id);

   
     return $this->successResponse( $branche,'sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
  public function unarchive( string $id)
  {
      try{
          $branche= $this->service_branche->unarchive_branche($id);

     return $this->successResponse( $branche,'sucessfully',200);
         
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
        
        $this->service_branche->delet_branche($id);
      
     return $this->successResponse( null,'the branche was deleted sucessfully',200);
         
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
