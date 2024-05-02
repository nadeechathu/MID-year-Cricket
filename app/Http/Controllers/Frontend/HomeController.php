<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\Sponsor;
use App\Models\UserSubscription;

class HomeController extends Controller
{
    public function getAllPublishedFeaturedPosts(Request $request){

        try{

            $homeHeader = 1;
            $slug = $request->slug;

            $events = Post::with('image')->where('type',0)->where('status',1)->orderBy('id','desc')->take(5)->get();
            $sponsoraLogos = Sponsor::where('status',1)->orderBy('id','desc')->get();
            $news = Post::with('image')->where('type',1)->where('status',1)->orderBy('id','desc')->take(6)->get();

            $metaContent = array(
                "page_title" => "Home | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.home')
            );


            return view('frontend.layouts.home',compact('homeHeader','events','slug','news','sponsoraLogos','metaContent'));


        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


    public function subscribe(Request $request){

                try{

                    $subscription = UserSubscription::where('email',$request->email)->get()->first();

                    if($subscription == null){

                        $subscription = new UserSubscription;

                        $subscription->email = $request->email;

                        $subscription = UserSubscription::create($subscription->toArray());


                        return response()->json([
                            'status' => true,
                            'msg' => 'Subscription added successfully !'
                        ]);

                    }else{

                        return response()->json([
                            'status' => false,
                            'msg' => 'User already subscribed !'
                        ]);
                    }


                }catch(\Exception $exception){
                    $error = $exception->getMessage().' - line - '.$exception->getLine();

                    return response()->json([
                        'status' => false,
                        'msg' => $error
                    ]);

                }


            }




}
