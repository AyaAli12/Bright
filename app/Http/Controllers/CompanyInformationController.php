<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponse as TraitsApiResponse;
use App\Http\Controllers\uploadImage as ControllersUploadImage;
use App\Models\CompanyInformation;
use companyService;
use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\Exception\HttpException;

class CompanyInformationController extends Controller
{
    use TraitsApiResponse;
  use ControllersUploadImage;
 
  public function __construct( public companyService $service_company)
  {
      
  }
  public function index()
  {
      try {
        $companies= $this->service_company->get_company();
        
        return $this->successResponse( $companies,' all companies',200);
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
     
      $company= $this->service_company->create_company($request);
       
      return $this->successResponse( $company,'the companies was created sucessfully',201);
         
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
          $company= $this->service_company->update_company($request,$id);

     ;
     return $this->successResponse( $company,'the companies was updated sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
  public function archive(Request $request, string $id)
  {
      try{
          $company= $this->service_company->archive_company($request,$id);

     ;
     return $this->successResponse( $company,'the companies was updated sucessfully',200);
         
  } 
  catch (\Exception $th ) {
    $status=($th instanceof HttpException)? $th->getCode():500;
     return $this->errorResponse(
       message: $th->getMessage(),
       status:$status
     
     );   
    }
  }
  public function unarchive(Request $request, string $id)
  {
      try{
          $company= $this->service_company->unarchive_company($request,$id);

     ;
     return $this->successResponse( $company,'the companies was updated sucessfully',200);
         
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
       
      $this->service_company-> delet_company($id);
     return $this->successResponse( null,'the companies was deleted sucessfully',200);
         
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
