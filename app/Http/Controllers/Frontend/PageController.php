<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RecaptchaChecker;
use App\Models\UserInquiry;
use App\Models\EmailSender;
use App\Models\Post;
use App\Models\ClubContact;
use App\Models\Rule;
use App\Models\Image;
use App\Models\Category;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class PageController extends Controller
{
    public function loadNews(Request $request)
    {
        try {

            $selectedNewsYear = $request->selectedYear;


            $latestNews = Post::with('featuredImage','images', 'user')
            ->where('type', 1)
            ->where('status',1)
            ->where(function($query) use ($selectedNewsYear){
                if($selectedNewsYear != null){

                    $query->where('event_date_time','like',$selectedNewsYear.'%');
                }else{
                    $query;
                }
            })
            ->orderBy('id', 'desc')->get()->first();

            $newsRelateds = Post::with('image', 'user')
            ->where('type', 1)
            ->where('status',1)
            ->where(function($query) use ($selectedNewsYear){
                if($selectedNewsYear != null){

                    $query->where('event_date_time','like',$selectedNewsYear.'%');
                }else{
                    $query;
                }
            })
            ->orderBy('id', 'desc')
                ->get();

            if($latestNews != null){
                $newsRelateds = Post::with('image', 'user')->where('type', 1)->where('status',1)->orderBy('id', 'desc')
                ->whereNotIn('id', [$latestNews->id])
                ->get();
            }

            $years = array();

            $news = Post::where('type', 1)->where('status',1)->orderBy('id', 'desc')->whereNotNull('event_date_time')->pluck('event_date_time')->toArray();

            foreach($news as $newsItem){

                array_push($years,explode('-',$newsItem)[0]);
            }

            $years = array_unique($years);

            $metaContent = array(
                "page_title" => "News | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.news')
            );

            return view('frontend.news.news_archive', compact('latestNews', 'newsRelateds','metaContent','selectedNewsYear','years'));
        } catch (\Exception $exception) {

            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function singleNews($slug)
    {

        try {

            $newsData = Post::with('featuredImage','images', 'user')->where('slug', $slug)->where('type', 1)->where('status', 1)->get()->first();

            if($newsData != null){

                return view('frontend.news.single_news', compact('newsData'));

            }else{

                return view('frontend.errors.error_404');
            }

        } catch (\Exception $exception) {

            $error = $exception->getMessage() . ' - line - ' . $exception->getLine();
            return view('frontend.errors.error_500', compact('error'));
        }
    }

    public function loadContactUs(Request $request)
    {
        try {
            $metaContent = array(
                "page_title" => "Contact Us | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.contact_us')
            );

            return view("frontend.pages.contact_us",compact('metaContent'));
        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function contactSubmit(Request $request)
    {

        try {

            $validator = Validator::make(
                $request->all(),
                [
                    'first_name' => 'required|unique:posts|max:255',
                    'last_name' => 'required|unique:posts|max:255',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'subject' => 'required',
                    'message' => 'required',
                    'g-recaptcha-response' => 'required'
                ],
                [
                    "g-recaptcha-response.required" => "Please mark reCAPTCHA security checks and try again"

                ]
            );

            $input = $request->all();

            $recaptchaCheckResponse = RecaptchaChecker::checkRecaptchaVaidity($input['g-recaptcha-response']);

            if($recaptchaCheckResponse != null){

                if(!$recaptchaCheckResponse['success']){

                    return redirect()->route('login')
                        ->with('error','Please mark the recaptcha security checks');
                }

            }else{
                return back()->with('error','Recaptcha error. Kindly contact support.');
            }


            //saving inquiry
            $inquiry = new UserInquiry;

            $inquiry->first_name = $request->first_name;
            $inquiry->last_name = $request->last_name;
            $inquiry->email = $request->email;
            $inquiry->phone = $request->phone;
            $inquiry->message = $request->message;
            $inquiry->subject = $request->subject;

            $savedInquiry = UserInquiry::create($inquiry->toArray());

            //sending customer email alerts
           EmailSender::sendUserInquryEmail($savedInquiry->id);

            return back()->with('success', 'Your inquiry sumitted successfully !');
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }
    public function loadGallery(Request $request)
    {
        try {
            $selectedCategory = $request->selected_category;
            $galleries = Image::getGalleryImageForFilters($request);
            $gallery_categories = Category::where('type',2)->where('status',1)->orderBy('id', 'DESC')->get();




            $metaContent = array(
                "page_title" => "Gallery | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.gallery')
            );

            return view('frontend.gallery.index',compact('galleries','metaContent','gallery_categories','selectedCategory'));

        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function loadEventsArchive(Request $request)
    {
        try {

            $selectedEventYear = $request->selectedYear;

            $events = Post::getEventForFilters($request);

            $eventDates = Post::where('type', 0)->where('status', 1)->orderBy('id', 'desc')->whereNotNull('event_date_time')->pluck('event_date_time')->toArray();

            $years = array();

            foreach($eventDates as $eventDate){

                array_push($years, explode('-',$eventDate)[0]);

            }

            $years = array_unique($years);


            $metaContent = array(
                "page_title" => "Events | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.events.archive')
            );

            return view('frontend.events.events_archive', compact('events','metaContent','selectedEventYear','years'));
        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function loadEventsSingle($slug)
    {
        try {
            $eventsData = Post::with('featuredImage','images', 'user')->where('slug', $slug)->where('type', 0)->where('status', 1)->get()->first();

            if($eventsData != null){

                return view('frontend.events.single_event', compact('eventsData'));

            }else{

                return view('frontend.errors.error_404');
            }

        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function loadClubContacts(Request $request)
    {
        try {

            $searchKey = $request->searchKey;
            $selectedTitle = $request->selected_title;

            $resources = ClubContact::getUserClubContactForFilters($request);

            $resourceTitles = ClubContact::where('status', 1)->pluck('competition_type')->toArray();

            $resourceTitles = array_unique($resourceTitles);


            $metaContent = array(
                "page_title" => "Resources | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.club.contacts')
            );

            $resources->appends(request()->query())->links();

            return view('frontend.club_contacts.index', compact('resources', 'searchKey', 'selectedTitle', 'resourceTitles','metaContent'));
        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function loadRuleRegulations(Request $request)
    {
        try {
            $rules = Rule::getRulesForFilters('');

            $metaContent = array(
                "page_title" => "Rules And Regulations | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.rules.regulations')
            );

            return view('frontend.rules_and_regulations.rules_regulations',compact('rules','metaContent'));
        } catch (\Exception $exception) {
            $error =  $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }
    public function loadSeasonCalender(Request $request)
    {
        try {

            $metaContent = array(
                "page_title" => " | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.season.calender')
            );

            return view('frontend.season_calendar.season_calendar',compact('metaContent'));
        } catch (\Exception $exception) {
            $error =  $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }
    public function getEventData(Request $request)  {


            $data = Post::with('featuredImage','images', 'user')->where('type', 0)->where('status', 1)->orderBy('id', 'desc')->get();



            return response()->json($data);

    }

    public function loadAboutUs(Request $request)
    {
        try {

            $metaContent = array(
                "page_title" => "About Us | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.about_us')
            );

            return view('frontend.about_us.index',compact('metaContent'));
        } catch (\Exception $exception) {
            $error =  $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function loadEventData($id)
    {
        try {
            $eventsData = Post::with('featuredImage','images', 'user')->where('id', $id)->where('type', 0)->where('status', 1)->get()->first();

              $slug = $eventsData->slug;



              return response()->json(['url' => route('web.events.single', ['slug'=>$slug])]);


        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

    public function loadResources(){

        try {
            $resources = Resource::where('type', 0)->where('status', 1)->get();

            $metaContent = array(
                "page_title" => "Resources | Mid Year Cricket Association",
                "meta_tag_description" => "View Mid Year Cricket Association's competitions, seasons and contact details.",
                "meta_keywords" => "",
                "canonical_url" => route('web.resources')
            );

            return view('frontend.resources.resources',compact('resources','metaContent'));


        } catch (\Exception $exception) {
            $error =
                $exception->getMessage() . " - line - " . $exception->getLine();
            return view("frontend.errors.error_500", compact("error"));
        }
    }

}
