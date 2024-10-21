<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

trait uploadImage{

    public function uploadImage($request, $input="image",$object,$folder_name){
        try {
            if ($object->image) {
                $this->deletePhoto($object->image);
            }
            $file = $request->file($input);
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'photo/' . $folder_name;
            $file->move($path, $file_name);
            $full_path= asset($path . $file_name);
            $object->image = $full_path; 
           $object->save();

        } catch (\Throwable $th) {
            //throw $th;
        }
    

    }
    
    public function deletePhoto($object)
    {
       
            Storage::disk('public')->delete($object->photo);
         $object->photo=null;
            $object->save();
        }
    }
