<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\UserInquiryMail;
use App\Models\UserInquiry;
use Log;
use URL;
use Mail;

class EmailSender extends Model
{
    use HasFactory;


    public static function sendUserInquryEmail($inquiryId){


        Log::channel('email_log')->info("[Inquiry email] ====> Received request to send inquiry placed email for the inquiry id == ".$inquiryId);

        $response = response()->json([]);

        try{


            $inquiry = UserInquiry::where('id',$inquiryId)->get()->first();

            if($inquiry != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $details = array(
                    'subject' => $inquiry->subject." - ".config('app.name')." - Inquiry Sumitted",
                    'email' =>  $inquiry->email,
                    'name' =>  $inquiry->first_name.' '.$inquiry->last_name,
                    'phone' =>  $inquiry->phone,
                    'message' => $inquiry->message,
                    'introduction' => 'Hi '.$inquiry->first_name.',',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => false

                );

                Mail::to($inquiry->email)->send(new UserInquiryMail($details));



                $inquiryEmailSettings = GeneralSetting::getSettingByKey('inquiry_email');

                $inquiryEmails = explode(',',$inquiryEmailSettings->description);

                $inquiryEmails = array_filter($inquiryEmails);

                $adminInquiryDetails = array(
                    'subject' => $inquiry->subject." - ".config('app.name')." - New Inquiry Received",
                    'email' =>  $inquiry->email,
                    'name' =>  $inquiry->first_name,
                    'phone' =>  $inquiry->phone,
                    'message' => $inquiry->message,
                    'introduction' => 'Hello, ',
                    'logo' => URL::to($siteLogo->description),
                    'is_admin' => true

                );

                foreach($inquiryEmails as $inquiryEmail){

                    if($inquiryEmail != null){

                        Mail::to($inquiryEmail)->send(new UserInquiryMail($adminInquiryDetails));

                    }

                }

                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Inquiry confirmation mail sent successfully to email - '.$inquiry->email

                ]);

            }else{

                $response = response()->json([
                    'status' => 'failed',
                    'message' => 'could not find the Inquiry for id - '.$inquiryId

                ]);
            }


        }catch(\Exception $exception){

            Log::channel('email_log')->info("[Inquiry email] ====>  Error occured when sending inquiry email == ".$exception->getMessage().' - line - '.$exception->getLine());

            $response = response()->json([
                'status' => 'failed',
                'message' => 'error occured',
                'payload' => $exception->getMessage().' - line - '.$exception->getLine()
            ]);

        }

        Log::channel('email_log')->info("[Inquiry email] ====>  Returning response == ".json_encode($response));

        return $response;

    }
}
