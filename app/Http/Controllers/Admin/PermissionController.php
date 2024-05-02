<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\UserPermission;
use App\Http\Controllers\Controller;
use Auth;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_permissions');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $permissions = Permission::getPermissionsForFilters($searchKey);

            $types = array('posts','category','tag','user','comment','pages','forms','settings','contacts','resources');

            return view('admin.permissions.all_permissions',compact('permissions','searchKey','types'));

        }else{

             return redirect('admin/not_allowed');

        }

    }

    public function createPermissions(Request $request){

        $hasPermission = Auth::user()->hasPermission('add_permissions');

        if($hasPermission){

            try{

                $newPermission = new Permission();

                $newPermission->name = $request->name;
                $newPermission->type = $request->type;

                Permission::create($newPermission->toArray());

                return back()->with('success','Permission created successfully !');

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }

        }else{

             return redirect('admin/not_allowed');

        }

    }




    public function updatePermissions(Request $request){

        $hasPermission = Auth::user()->hasPermission('edit_permissions');

        if($hasPermission){

            try{

                $permission = Permission::find($request->permission_id);

                if($permission != null){

                    $permission->name = $request->name;
                    $permission->type = $request->type;                    

                    $permission->save();

                    return back()->with('success','Permission updated successfully !');

                }else{
                    return back()->with('error','Could not find the permission.');
                }

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }

        }else{

            return redirect('admin/not_allowed');

       }

    }

    public function updateUserPermissions(Request $request){

        $hasPermission = Auth::user()->hasPermission('add_permissions');

        if($hasPermission){

            try{

                $permissions = $request->permissions;

                $user = User::find($request->user_id);

                if($user != null){

                    $user->permissions()->detach();

                    $user->permissions()->attach($permissions);

                    return back()->with('success','User permissions updated successfully !');

                }else{
                    return back()->with('error','Could not find the user !');

                }

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage().' - line - '.$exception->getLine());

            }

        }else{

            return redirect('admin/not_allowed');

       }



    }

    public function deletePermissions($id){

        $hasPermission = Auth::user()->hasPermission('add_permissions');

        if($hasPermission){

            try{

                $usersWithPermissions = UserPermission::where('permission_id',$id)->get();

                foreach($usersWithPermissions as $userForPermission){
                    $user = User::find($userForPermission->user_id);

                    if($user){
                        $user->permissions()->detach($id);
                    }
                }

                $deleted = Permission::where('id',$id)->delete();

                return back()->with('success','Permission deleted successfully !');


            }catch(\Exception $exception){
                return back()->with('error','Error occured - '.$exception->getMessage().' - line - '.$exception->getLine());
            }

        }else{

            return redirect('admin/not_allowed');

        }


    }
}
