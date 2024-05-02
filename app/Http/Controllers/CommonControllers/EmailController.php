<?php

namespace App\Http\Controllers\CommonControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Mail;
use Log;

class EmailController extends Controller
{
    public function sendForgotPasswordEmail(Request $request){

        Log::channel('email_log')->info("[Forgot Password Email LOG] ====> Received request to send forgot password email for the email == ".$request->email);

        $response = response()->json([]);

        try{

            if($request->has('email')){

                
                    $user = User::where('email',$request->email)->get()->first();

                    if($user != null){

                        $details = array(
                            'subject' => config('app.name')." - Reset Password Request",
                            'introduction' => "Hi ".$user->first_name.",",
                            'body' => "A request has been received to change the password for your account. Ignore if this is not you.",
                            'link' =>  '/'
                        );

                        Mail::to('lahiru@guisrilanka.com')->send(new ForgotPasswordMail($details));
    
                        $response = response()->json([
                            'status' => 'success',
                            'message' => 'forgot password email sent successfully !',
                            'payload' => null
                        ]);

                    }else{

                        $response = response()->json([
                            'status' => 'failed',
                            'message' => 'could not find the user for email - '.$request->email,
                            'payload' => null
                        ]);
                    }                   

            }else{

                $response = response()->json([
                    'status' => 'failed',
                    'message' => 'mandatory fields missing',
                    'payload' => null
                ]);

            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Forgot Password Email LOG] ====>  Error occured when sending forgot password email == ".$exception->getMessage().' - line - '.$exception->getLine());
            
            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

        Log::channel('email_log')->info("[Forgot Password Email LOG] ====>  Returning response == ".json_encode($response));

        return $response;
    }
}
