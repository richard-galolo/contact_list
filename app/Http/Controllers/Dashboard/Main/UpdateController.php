<?php

namespace App\Http\Controllers\Dashboard\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;

class UpdateController extends Controller
{
    public function index(Request $request)
	{
		$params = request()->validate([
			'image' 			=> 'nullable|mimes:jpeg,jpg,png|max:10000',
			'first_name'		=> 'required|regex:/^[a-zA-Z\s]*$/',
			'last_name' 		=> 'required|regex:/^[a-zA-Z\s]*$/',
			'contact_number'	=> 'required',
    	]);

		$user = User::find(\Auth::user()->id);

        if (isset($request->image)) {

            $image_path = "uploads/".$user->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

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

       	$user->update($params);

        return response()->json(['message' => 'Your Profile updated successfully']);
	}
}
