<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use View;
use App\Models\Form;
use App\Models\Post;
use App\Models\GeneralSetting;
use App\Models\SiteSetting;
use App\Models\Image;
use App\Models\Category;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     public $commonContent;
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


            $sliderImages = Image::getSliderImages();
            $siteName = GeneralSetting::getSettingByKey('site_name');
            $siteDescription = GeneralSetting::getSettingByKey('site_description');
            $siteLogo = GeneralSetting::getSettingByKey('site_logo');
            $analytics = GeneralSetting::getSettingByKey('analytics');

            $facebookLink = GeneralSetting::getSettingByKey('facebook_link');
            $twitterLink = GeneralSetting::getSettingByKey('twitter_link');
            $instagramLink = GeneralSetting::getSettingByKey('instagram_link');
            $youtubeLink = GeneralSetting::getSettingByKey('youtube_link');
            $formLinks = Form::where('status',1)->get();
            $categories = Category::where('type',0)->get();
            $popularEvents = Post::where('type',0)->where('status',1)->orderBy('id','desc')->take(6)->get();
            $content = [];

            $content['sliderImages'] = $sliderImages;
            $content['siteName'] = $siteName;
            $content['siteDescription'] = $siteDescription;
            $content['siteLogo'] = $siteLogo;
            $content['categories'] = $categories;
            $content['analytics'] = $analytics;
            $content['facebookLink'] = $facebookLink;
            $content['twitterLink'] = $twitterLink;
            $content['instagramLink'] = $instagramLink;
            $content['youtubeLink'] = $youtubeLink;
            $content['formLinks'] = $formLinks;
            $content['popularEvents'] = $popularEvents;

        $this->commonContent = $content;

        // dd($this->commonContent);
        View::share('commonContent', $this->commonContent);

    }
}
