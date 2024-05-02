<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;

    // types
    const BLOG = 0;
    const NEWS = 1;

    // status
    const UNPUBLISHED = 0;
    const PUBLISHED = 1;

    // approved status
    const NOT_APPROVED = 0;
    const APPROVED = 1;

    protected $fillable = ['title', 'body', 'status', 'type', 'user_id', 'is_approved', 'category_id', 'featured', 'slug','event_date_time ','location'];

    public function postComments()
    {
        return $this->hasMany(Comment::class, 'id', 'entity_id')->where('type', 0);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'entity_id', 'id')->where('entity', 'post');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'entity_id', 'id')->where('entity', 'post')->where('is_featured', 0);
    }

    public function featuredImage()
    {
        return $this->hasOne(Image::class, 'entity_id', 'id')->where('entity', 'post')->where('is_featured', 1);
    }
    public static function getUserPostForId($id)
    {
        return Post::with('image','images','featuredImage')->where('id', $id)
            ->get()->first();
    }

    public static function getPostForId($id)
    {
        return Post::where('id', $id)->get()->first();
    }

    public static function getNewsEvetsForFilters($searchKey, $type)
    {

        return Post::with('category')->where('title', 'like', '%' . $searchKey . '%')
            ->where('type', $type)
            ->orderBy('id', 'desc')
            ->paginate(env("RECORDS_PER_PAGE"));
    }


    public static function getPost($id)
    {
        return Post::where('id', $id)->get()->first();
    }

    public static function getAllPostsToApprove($searchKey)
    {

        return Post::where('title', 'like', '%' . $searchKey . '%')
            ->where('is_approved', Post::NOT_APPROVED)
            ->orderBy('id', 'desc')
            ->paginate(env("RECORDS_PER_PAGE"));
    }

    public static function getEventForFilters($request)
    {

        return  Post::with('featuredImage','images', 'user')->where('type', 0)->where('status', 1)
            ->orderBy('id', 'desc')

            ->where(function ($query) use ($request) {

                if ($request->selectedYear != null) {

                    $query->where('event_date_time', 'like', $request->selectedYear . '%');


                } else {

                    $query;
                }
            })

            ->paginate(env("RECORDS_PER_PAGE"));
    }



}
