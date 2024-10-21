<?php

namespace App\Http\Controllers;

use companyService;
use HomeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HomeController extends Controller
{
    public function __construct( public HomeService $home_service)
    {
        
    }
    public function companies()
    {
        try {
          $companies= $this->home_service->get_unArchived_company();
          
          return $this->successResponse( $companies,' all companies',200);
        }  catch (\Exception $th ) {
            $status=($th instanceof HttpException)? $th->getCode():500;
             return $this->errorResponse(
               message: $th->getMessage(),
               status:$status
             
             );   
            }
    }

    public function branches()
    {
        try {
          $branches= $this->home_service->get_unArchived_branches();
          
          return $this->successResponse( $branches,' all branches',200);
        }  catch (\Exception $th ) {
            $status=($th instanceof HttpException)? $th->getCode():500;
             return $this->errorResponse(
               message: $th->getMessage(),
               status:$status
             
             );   
            }
    }
    public function clients()
    {
        try {
          $clients= $this->home_service->get_unArchived_clients();
          
          return $this->successResponse( $clients,' all clients',200);
        }  catch (\Exception $th ) {
            $status=($th instanceof HttpException)? $th->getCode():500;
             return $this->errorResponse(
               message: $th->getMessage(),
               status:$status
             
             );   
            }
    }
    public function contacts()
    {
        try {
          $contacts= $this->home_service->get_unArchived_contact();
          
          return $this->successResponse( $contacts,' all contacts',200);
        }  catch (\Exception $th ) {
            $status=($th instanceof HttpException)? $th->getCode():500;
             return $this->errorResponse(
               message: $th->getMessage(),
               status:$status
             
             );   
            }
    }
    public function projects()
    {
        try {
          $projects= $this->home_service->get_unArchived_projects();
          
          return $this->successResponse( $projects,' all projects',200);
        }  catch (\Exception $th ) {
            $status=($th instanceof HttpException)? $th->getCode():500;
             return $this->errorResponse(
               message: $th->getMessage(),
               status:$status
             
             );   
            }
        }
        public function services()
        {
            try {
              $services= $this->home_service->get_unArchived_service();
              
              return $this->successResponse( $services,' all services',200);
            }  catch (\Exception $th ) {
                $status=($th instanceof HttpException)? $th->getCode():500;
                 return $this->errorResponse(
                   message: $th->getMessage(),
                   status:$status
                 
                 );   
                }
        }

}
