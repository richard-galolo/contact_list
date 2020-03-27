<?php

namespace App\Http\Controllers\Dashboard\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;

class ViewController extends Controller
{
    public function index(Request $request)
    {	
    	if ($request->expectsJson()) {
    		$users = User::select(['id','image','first_name','last_name','email','contact_number','status'])
                ->where('id', '!=', 1)
	            ->latest()
	            ->get();

	        return Datatables::of($users)
	            ->addIndexColumn()
	            ->addColumn('name', function($user){
	                $name = ucwords($user->first_name.' '.$user->last_name);

	                $photo = $user->image ? 
	                        '<img src='.asset('uploads/'.$user->image).' class="rounded-circle mr-2" width="40px" height="40px">' : 
	                        '<img src="admin_dashboard/img/default.png" class="rounded-circle mr-2" width="40px" height="40px">' ;
	                return $photo.$name;
	            })
	            ->addColumn('email', function($user){
	                return $user->email ? $user->email : '';
	            })
	            ->addColumn('contact_number', function($user){
	               	return $user->contact_number ? $user->contact_number : '';
	            })
	            ->addColumn('status', function($user){
	               	$status = $user->status == 1 ? 
                        '<i class="mdi mdi-checkbox-blank-circle text-success"></i> Active' :
                        '<i class="mdi mdi-checkbox-blank-circle text-danger"></i> Inactive' ;
                    return $status;
	            })
	            ->escapeColumns([])->make(true);
    	}

    	return view('dashboard.main.dashboard');
    }

    public function profile()
    {
        return view('dashboard.main.profile',[
                'user' => \Auth::user()
            ]);
    }
}
