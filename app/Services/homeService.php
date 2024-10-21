<?

use App\Http\Resources\BrancheResource;
use App\Models\Branche;
use App\Models\Client;
use App\Models\CompanyInformation;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;

class HomeService{

    public function get_unArchived_branches(){
        try{
        $branches=Branche::where('IsArchived',false)->get();
        $branches=BrancheResource::collection($branches);
        if($branches){
            return $branches;
        }    } catch (\Exception $th) {
            throw $th;
        }
    
    } 
    public function get_unArchived_clients(){
        try{
        $clients=Client::where('IsArchived',false)->get();
        if($clients){
            return $clients;
        }    } catch (\Exception $th) {
            throw $th;
        }
    
    }
    public function get_unArchived_company(){
        try{
        $company=CompanyInformation::where('IsArchived',false)->get();
        if($company){
            return $company;
        }    } catch (\Exception $th) {
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
    public function get_unArchived_projects(){
        try{
        $projects=Project::where('IsArchived',false)->get();
        if($projects){
            return $projects;
        }    } catch (\Exception $th) {
            throw $th;
        }
    
    }
    public function get_unArchived_service(){
        try{
        $services=Service::where('IsArchived',false)->get();
        if($services){
            return $services;
        }    } catch (\Exception $th) {
            throw $th;
        }
    
    }
}