<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //types
    const SLIDER = 0;
    const POST = 1;

    //status
    const NO_SHOW = 0;
    const SHOW = 1;

    protected $fillable = ['type','category_id','src','entity','entity_id','alt_text','heading','caption','status','is_featured'];

    public static function getSliderImages(){
        return Image::where('type',Image::SLIDER)->where('status',Image::SHOW)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }



    public static function getImageForFilters($request)
    {

        return  Image::with('category')


            ->where(function ($query) use ($request) {

                if ($request->selected_category != null) {

                    $category = Category::where('id',$request->selected_category)->get()->first();

                    $query->where('category_id', $category->id);

                } else {

                    $query;
                }
            })
           ->orderBy('id','desc')
            ->paginate(env("RECORDS_PER_PAGE"));
    }

    public static function getGalleryImageForFilters($request)
    {

        return  Image::with('category')->where('status',1)


            ->where(function ($query) use ($request) {

                if ($request->selected_category != null) {

                    $categoryIds = Category::where('slug','like','%'.$request->selected_category.'%')->pluck('id')->toArray();

                    $query->whereIn('category_id', $categoryIds);

                } else {

                    $query;
                }
            })

            ->get();
    }

}
