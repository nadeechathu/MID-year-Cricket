<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\GeneralSetting;
use App\Models\SiteSetting;
use App\Models\SiteTemplate;
use App\Models\EmailSetting;
use App\Http\Controllers\Controller;
use Auth;

class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadSliderImagesUI(){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $sliderImages = Image::where('type',Image::SLIDER)->get();

            $sliderHeading = GeneralSetting::where('setting_key','slider_heading')->get()->first();
            $sliderDescription = GeneralSetting::where('setting_key','slider_description')->get()->first();

            return view('admin.settings.slider_settings',compact('sliderImages','sliderHeading','sliderDescription'));

        }else{

            return redirect('admin/not_allowed');

        }


    }

    public function uploadSliderImages(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            try{

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/uploads/slider/'), $imageName);
                $imageUrl = 'images/uploads/slider/' . $imageName;

                $newImage = new Image;

                $newImage->type = Image::SLIDER;
                $newImage->src = $imageUrl;
                $newImage->alt_text = $request->alt_text;
                $newImage->status = $request->status;
                $newImage->heading = $request->heading;
                $newImage->caption = $request->caption;

                $newImage = Image::create($newImage->toArray());

                return back()->with('success','New image slider added successfully !');

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }


        }else{

            return redirect('admin/not_allowed');

        }



    }

    public function updateSliderImages(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            try{


                $updateImage = Image::find($request->image_id);

                if($updateImage != null){


                    if($request->image != null){

                        $imageName = time().'.'.$request->image->extension();
                        $request->image->move(public_path('images/uploads/slider/'), $imageName);
                        $imageUrl = 'images/uploads/slider/' . $imageName;

                        $updateImage->src = $imageUrl;

                    }


                    $updateImage->alt_text = $request->alt_text;
                    $updateImage->status = $request->status;
                    $updateImage->heading = $request->heading;
                    $updateImage->caption = $request->caption;

                    $updateImage->save();

                    return back()->with('success','New image slider updated successfully !');


                }else{

                    return back()->with('error','Could not find the slider image');

                }


            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }


        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function removeSliderImages($id){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            try{

                $imageDeleted = Image::where('id',$id)->delete();

                return back()->with('success','Image slider deleted successfully !');


            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }


        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function updateAnalyticsUI(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $analytics = GeneralSetting::getSettingByKey('analytics');

            return view('admin.settings.analytics_settings',compact('analytics'));

        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function updateAnalytics(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            try{

                $analytics = GeneralSetting::getSettingByKey('analytics');

                if($analytics != null){

                    $analytics->description = $request->analytics;
                    $analytics->save();

                    return back()->with('success','Analytics code updated successfully !');

                }else{

                    return back()->with('error','Analytics configuration record not found.');
                }

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }

        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function siteSettingsUI(){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

           $siteSettings = SiteSetting::with('templates')->get()->keyBy('section');

           $siteName = GeneralSetting::getSettingByKey('site_name');
           $siteDescription = GeneralSetting::getSettingByKey('site_description');
           $siteLogo = GeneralSetting::getSettingByKey('site_logo');

           $facebook_link = GeneralSetting::getSettingByKey('facebook_link');
           $instagram_link = GeneralSetting::getSettingByKey('instagram_link');
           $twitter_link = GeneralSetting::getSettingByKey('twitter_link');
           $youtube_link = GeneralSetting::getSettingByKey('youtube_link');

           return view('admin.settings.site_settings',compact('siteSettings','siteName','siteDescription','siteLogo','facebook_link','instagram_link','twitter_link','youtube_link'));

        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function updateSiteParameters(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

           $siteName = GeneralSetting::getSettingByKey('site_name');
           $siteName->description = $request->site_name;
           $siteName->save();

           $siteDescription = GeneralSetting::getSettingByKey('site_description');
           $siteDescription->description = $request->site_description;
           $siteDescription->save();

           if($request->site_logo != null){

                $siteLogo = GeneralSetting::getSettingByKey('site_logo');

                $imageName = time().'.'.$request->site_logo->extension();
                $request->site_logo->move(public_path('images/uploads/logo/'), $imageName);
                $imageUrl = 'images/uploads/logo/' . $imageName;

                $siteLogo->description = $imageUrl;

                $siteLogo->save();

           }


           return back()->with('success','Site parameters updated successfully !');

        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function updateSiteSettings(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

           SiteSetting::updateSiteSetting('header_template', $request->header_template);
           SiteSetting::updateSiteSetting('slider_template', $request->slider_template);
           SiteSetting::updateSiteSetting('section1_template', $request->section1_template);
           SiteSetting::updateSiteSetting('section2_template', $request->section2_template);
           SiteSetting::updateSiteSetting('section3_template', $request->section3_template);
           SiteSetting::updateSiteSetting('footer_template', $request->footer_template);
           SiteSetting::updateSiteSetting('category_view_template', $request->category_view_template);
        //    SiteSetting::updateSiteSetting('post_view_template', $request->post_view_template);
           SiteSetting::updateSiteSetting('post_card_template', $request->post_card_template);

           return back()->with('success','Site settings updated successfully !');

        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function getAllTemplates(Request $request){
        $searchKey = $request->searchKey;

        $templates = SiteTemplate::getTemplateForFilters($searchKey);
        $siteSettings = SiteSetting::with('templates')->get()->keyBy('section');

        return view('admin.settings.site_templates',compact('templates','siteSettings','searchKey'));
    }

    public function addNewTemplate(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $validated = $request->validate([

                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ],
            [
                'image.required' => 'Category image required.',
                'image.mimes' => 'Image types should be jpg,png,jpeg.',
                // 'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',

            ]);


            $template = new SiteTemplate;

            $template->section = $request->section;
            $template->template_number = $request->template_number;



            if($request->file('image')){

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/uploads/template-images/'), $imageName);
                $imageUrl = 'images/uploads/template-images/' . $imageName;

                $template->template_image = $imageUrl;


            }



            SiteTemplate::create($template->toArray());

            return back()->with('success','Site template added successfully !');

        }else{

            return redirect('admin/not_allowed');
        }

    }


    public function updateTemplate(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){


            $validated = $request->validate([

                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ],
            [
                'image.required' => 'Template image required.',
                'image.mimes' => 'Image types should be jpg,png,jpeg.',
                // 'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',

            ]);



            $template = SiteTemplate::find($request->template_id);

            if($template != null){

                $template->section = $request->section;
                $template->template_number = $request->template_number;

                if($request->file('image')){

                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('images/uploads/template-images/'), $imageName);
                    $imageUrl = 'images/uploads/template-images/' . $imageName;

                    $template->template_image = $imageUrl;
                }



                $template->save();

                return back()->with('success','Site template updated successfully !');

            }else{

                return back()->with('error','Could not find the site template');

            }

        }else{

            return redirect('admin/not_allowed');
        }
    }

    public function removeTemplate(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $template = SiteTemplate::where('id',$request->template_id)->get()->first();

            $activeTemplate = SiteSetting::where('section','header_template')->get()->first();


            if($template != null){


                if($template->template_number == $activeTemplate->template_number){

                    return back()->with('warning', 'The template you are trying to remove is an active tempate. Please set an different template as active and then try again.');
                }
                else{

                    $template = SiteTemplate::where('id',$request->template_id)->delete();

                    return back()->with('success','Site template removed successfully !');
                }


            }else{

                return back()->with('error','Could not find the site template');

            }

        }else{

            return redirect('admin/not_allowed');
        }
    }

    public function emailSettings(Request $request){

        $emailSettings = EmailSetting::paginate(env("RECORDS_PER_PAGE"));

        return view('admin.settings.email_settings',compact('emailSettings'));
    }

    public function removeEmailConfig(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $emailSetting = EmailSetting::where('id',$request->email_id)->get()->first();


            if($emailSetting != null){

                $emailSetting = EmailSetting::where('id',$request->email_id)->delete();

                return back()->with('success','Email configuration removed successfully !');


            }else{

                return back()->with('error','Could not find the email configuration');

            }

        }else{

            return redirect('admin/not_allowed');
        }

    }

    public function addEmailConfig(Request $request){


        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $this->validate($request, [
                'mailer' => 'required',
                'host' => 'required',
                'port' => 'required',
                'username' => 'required',
                'password' => 'required',
                'encryption' => 'required',
                'from_address' => 'required',
                'from_name' => 'required',
            ],
            [
                'mailer.required' => 'New password required.',
                'host.required' => 'New password required.',
                'port.required' => 'New password required.',
                'username.required' => 'New password required.',
                'password.required' => 'New password required.',
                'encryption.required' => 'New password required.',
                'from_address.required' => 'New password required.',
                'from_name.required' => 'New password required.'

            ]);


            $emailSetting = EmailSetting::where('username',$request->username)->get()->first();


            if($emailSetting == null){

                $emailSetting = new EmailSetting;

                $emailSetting->fill($request->all());

                EmailSetting::create($request->toArray());

                return back()->with('success','Email configuration added successfully !');


            }else{

                return back()->with('error','Email configuration exists for the username - '.$request->username);

            }

        }else{

            return redirect('admin/not_allowed');
        }

    }

    public function updateEmailConfig(Request $request){

        $hasPermission = Auth::user()->hasPermission('site_settings');

        if($hasPermission){

            $this->validate($request, [
                'mailer' => 'required',
                'host' => 'required',
                'port' => 'required',
                'username' => 'required',
                'password' => 'required',
                'encryption' => 'required',
                'from_address' => 'required',
                'from_name' => 'required',
            ],
            [
                'mailer.required' => 'New password required.',
                'host.required' => 'New password required.',
                'port.required' => 'New password required.',
                'username.required' => 'New password required.',
                'password.required' => 'New password required.',
                'encryption.required' => 'New password required.',
                'from_address.required' => 'New password required.',
                'from_name.required' => 'New password required.'

            ]);


            $emailSetting = EmailSetting::find($request->email_id);


            if($emailSetting != null){

                $emailSetting->fill($request->all());

                $emailSetting->save();

                return back()->with('success','Email configuration updated successfully !');


            }else{

                return back()->with('error','Could not find the email configuration.');

            }

        }else{

            return redirect('admin/not_allowed');
        }

    }

        public function getTemplateForTemplateNumber(Request $request){

            $templateNumber = $request->templateNumber;
            $section = $request->section;

            $template = SiteTemplate::where('template_number',$templateNumber)
            ->where('section',$section)->get()->first();


            if($template != null){

                return response()->json([
                    'status' => true,
                    'template' => $template
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'template' => null
                ]);
            }


        }

        public function getAllActiveTemplates(){

            $siteSettings = SiteSetting::all();


            $templates = array();

            foreach($siteSettings as $siteSetting){

                $template = SiteTemplate::where('template_number',$siteSetting->template_number)
                ->where('section',$siteSetting->section)->get()->first();

                if($template != null){
                    array_push($templates,$template);
                }
            }

            return response()->json([
                'status' => true,
                'templates' => $templates
            ]);
        }

        public function updateSocialLinks(Request $request){


            $hasPermission = Auth::user()->hasPermission('site_settings');

            if($hasPermission){

                if($request->facebook_link != null){

                    $facebook_link = GeneralSetting::getSettingByKey('facebook_link');

                    $facebook_link->description = $request->facebook_link;
                    $facebook_link->save();

                }

                if($request->twitter_link != null){

                    $twitter_link = GeneralSetting::getSettingByKey('twitter_link');


                    $twitter_link->description = $request->twitter_link;
                    $twitter_link->save();

                }

                if($request->instagram_link != null){

                    $instagram_link = GeneralSetting::getSettingByKey('instagram_link');


                    $instagram_link->description = $request->instagram_link;
                    $instagram_link->save();

                }

                if($request->youtube_link != null){

                    $youtube_link = GeneralSetting::getSettingByKey('youtube_link');


                    $youtube_link->description = $request->youtube_link;
                    $youtube_link->save();

                }


                return back()->with('success','Social links updated successfully !');

            }else{

                return redirect('admin/not_allowed');
            }



        }

}
