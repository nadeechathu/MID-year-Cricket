<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const INACTIVE = 0;

    const POST = 0;
    const PRODUCT = 1;

    protected $fillable=['category_name','category_description','slug','status','type','category_image','page_title','meta_tag_description','meta_keywords','canonical_url'];

    public static function getCategoriesForFilters($searchKey){

        return Category::where('category_name','like','%'.$searchKey.'%')
        ->orderBy('id', 'desc')
        ->paginate(env("RECORDS_PER_PAGE"));
    }
}
