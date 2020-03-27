<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateRequest;
use App\Mail\CreateUser;
use App\Models\User;
use Redirect;
use Mail;

class CreateController extends Controller
{
    public function index(CreateRequest $request)
    {	
    	$params = $request->all();
    	$params['password'] = \Hash::make($params['password']);

    	if (isset($params['image'])) {
    		unset($params['image']);
	    	$image_name = str_replace(" ","_",pathinfo($request->file('image')->getClientOriginalName(),PATHINFO_FILENAME));
		 	$filename = time()."_".getFileName($image_name,$request->file('image'));
		 	$params["image"] = date("Y").'/'.date("m").'/'.$filename;
		 	$uploadfolder = base_path() . '/public/uploads/';
	        $path = $uploadfolder.date("Y").'/'.date("m");
		 	$path = str_replace($uploadfolder, '', $path.'/');
		 	$request->file('image')->move(
	            base_path() . '/public/uploads/'.$path,
	            $filename
	        );
    	}
    	User::create($params);
        Mail::to($params['email'])->send(new CreateUser($params));

    	return Redirect::route('users')->withSuccess('User successfully registered');
    }
}
