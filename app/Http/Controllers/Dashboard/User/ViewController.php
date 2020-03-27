<?php

namespace App\Http\Controllers\Dashboard\User;

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
	            ->addColumn('action', function ($user){
                    $status = $user->status == 1 ? 'Deactivate' : 'Activate';
                    $button = $user->status == 1 ?
                        '<button class="btn btn-sm btn-danger"> 
                            <i class="mdi mdi-minus-circle"></i> Deactivate
                        </button>' :
                        '<button class="btn btn-sm btn-success pl-3 pr-3"> 
                            <i class="mdi mdi-check-circle"></i> Activate
                        </button>' ;

                	$action = '<div style="display:flex">
                                    <a href='.route('users.edit', base64_encode($user->id)).'>
                                        <button class="btn btn-sm btn-primary mr-1"> 
                                            <i class="mdi mdi-account-edit"></i> Edit
                                        </button>
                                    </a>
                                    <a href='.route('users.status',base64_encode($user->id)).' class="btn_status mr-1"
                                        data-status='.$status.'>
                                        '.$button.'
                                    </a>
                			   </div>';
                	return $action;
                })
	            ->escapeColumns([])->make(true);
    	}

    	return view('dashboard.users.index');
    }

    public function add()
    {
        return view('dashboard.users.add');
    }

    public function edit($id)
    {   
        $user = User::find(base64_decode($id));

        return view('dashboard.users.edit',[
                'user' => $user
            ]);
    }
}
