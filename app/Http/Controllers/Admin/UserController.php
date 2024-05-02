<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\UserSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $hasPermission = Auth::user()->hasPermission('view_users');

        if($hasPermission){
                
            $searchKey = $request->searchKey;
            $users = User::getUsersForFilters($searchKey);
            $permissions = Permission::get()->groupBy('type')->toArray();
            $roles = Role::all();
    
            foreach($users as $user){
                $user->assigned_permissions = User::getUserPermissions($user->id);
            }
    
            return view('admin.users.all_users',compact('users','permissions','searchKey','roles'));
            

        }else{
            return redirect('admin/not_allowed');
        }
       
       
    }

    public function update(Request $request){
        
        $hasPermission = Auth::user()->hasPermission('edit_users');

        if($hasPermission){
                
            $validated = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'digits:10'],
                'dob' => ['required'],
                'role' => ['required'],
            ]);

            $user = User::where('id',$request->user_id)->get()->first();

            if($user != null){
                $user->email = $request->email;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->dob = $request->dob;
                $user->role_id = $request->role;

                if($request->file('image')){

                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('images/uploads/users/'), $imageName);
                    $imageUrl = 'images/uploads/users/' . $imageName;
    
                    $user->user_image = $imageUrl;
                }
               
                $user->save();

                return back()->with('success','User updated successfully !');
                
            }else{
                return back()->with('error','Could not find the user');
            }
            

        }else{
            return redirect('admin/not_allowed');
        }

            
    }

    public function changeStatus($id){

        

        try{

            $hasPermission = Auth::user()->hasPermission('edit_users');

            if($hasPermission){
                    
                $user = User::where('id',$id)->get()->first();

                if($user != null){
                    if($user->status == 1){
                        $user->status = User::INACTIVE;

                        $user->save();
                        return back()->with('success','User deactivated successfully !');
                    }else if($user->status == 0){
                        $user->status = User::ACTIVE;

                        $user->save();

                        return back()->with('success','User activated successfully !');
                    }
                }else{
                    return back()->with('error','Could not find the user');
                }

                

            }else{
                return redirect('admin/not_allowed');
            }
            

        }catch(\Exception $exception){
            return back()->with('error','Error occured - '.$exception->getMessage());
        }
    }

    public function userProfileUI(){

        $user = Auth::user();

        return view('admin.users.profile',compact('user'));
    }

    public function changeUserPassword(Request $request){

    

            $this->validate($request, [
                'password' => 'required|confirmed|min:8',
            ],
            [
                'password.required' => 'New password required.',
                'password.confirmed' => 'Password and confirm password does not match.',
                'password.min' => 'Minimum password length is 8 characters.',
            ]);

            $user = User::where('id',$request->user_id)->get()->first();

            if($user != null){

                $user->password = Hash::make($request->password);
                $user->save();

                return back()->with('success','Password changed successfully !');

            }else{

                return back()->with('error','Could not find the user.');

            }

      
        
    }



    public function subscribesUI(Request $request)
    {
        $searchKey = $request->searchKey;
       
        $subscriptions = UserSubscription::getSubscriptionsForFilters($searchKey);

        return view('admin.users.user_subscriptions',compact('subscriptions','searchKey'));
       
    }







    public function exportSubscriptions(){

        $userSubscriptions = UserSubscription::all();

        $fileName = date('Y_m_d').'_subscriptions.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('SUBSCRIPTION EMAIL', 'SUBSCRIBED ON');

        $callback = function() use($userSubscriptions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($userSubscriptions as $userSubscription) {                             
                                                        
                $row['SUBSCRIPTION EMAIL']  = $userSubscription->email;
                $row['SUBSCRIBED ON']  = $userSubscription->created_at;
                                         

                fputcsv($file, array($row['SUBSCRIPTION EMAIL'], $row['SUBSCRIBED ON']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

}
}
