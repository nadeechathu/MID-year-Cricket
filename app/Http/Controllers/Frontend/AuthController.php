<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\AuthAPIClient;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\GeneralSetting;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use Session;
use Mail;
use Auth;
use URL;

class AuthController extends Controller
{
    public function loginUI(){
        return view('frontend.authentication.login');
    }

 

    public function logout(Request $request){


        Session::forget('user');
        Session::forget('token');
        return redirect('/');
    }

    public function registerUI(){
        return view('frontend.authentication.register');
    }

    public function register(Request $request){


        try{

            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'digits:10'],
                'dob' => ['required'],
            ]);

            if($request->password != $request->confirm_password){

                return back()->with('error','Password and the confirm password does not match.');

            }elseif(sizeof($request->password) < 8){

                return back()->with('error','Minimum password length is 8 characters.');
            }


            $response = AuthAPIClient::register($request);

            if($response['status']){

                return redirect('/login')->with('success','Registration succeeded. Please login to continue.');
            }else{

                return back()->with('error',$response['message']);
            }

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }


    }

    public function forgotPasswordUI(){
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $request){

        try{

            if($request->has('email')){

                $user = User::where('email',$request->email)->get()->first();

                if($user != null){

                    //generate password reset token
                    $resetToken = Str::random(32);

                    $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                    $details = array(
                        'subject' => config('app.name')." - Reset Password Request",
                        'introduction' => "Hi ".$user->first_name.",",
                        'body' => "A request has been received to change the password for your account. Ignore if this is not you.",
                        'link' =>  route('web.password.resetUI',['token'=>$resetToken]),
                        'logo' => URL::to($siteLogo->description)
                    );


                    Mail::to($user->email)->send(new ForgotPasswordMail($details));

                    $user->password_reset_token = $resetToken;
                    $user->save();


                    return back()->with('success','Please check your registered email address and follow the instructions.');

                }else{

                    return back()->with('error','No user registered with the provided email.');
                }


            }else{
                return back()->with('error','Please enter the email address');
            }

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function resetPassword($token){

        try{

            $user = User::where('password_reset_token',$token)->get()->first();

            if($user != null){

                $email = $user->email;

                return view('auth.reset_password',compact('email'));


            }else{

                $error = "Invalid password reset attempt";
                return view('frontend.errors.error_404',compact('error'));

            }


        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }

    }

    public function changePassword(Request $request){


        try{

            $request->validate([
                'email' => ['required'],
                'password' => ['required'],
                'confirm_password' => ['required']
            ]);

            if($request->password != $request->confirm_password){

                return back()->with('error','Passwords does not match. Please check again.');
            }


            $user = User::where('email',$request->email)->get()->first();

            if($user != null){

                $user->password = Hash::make($request->password);
                $user->password_reset_token = null;
                $user->save();

                Auth::logout();

                return redirect('/login')->with('success', 'Password changed. Please login with new password');


            }else{

                return back()->with('error','Password change failed. Reason - No user found for the given email');
            }

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }

    }
}
