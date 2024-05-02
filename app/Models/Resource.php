<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','pdf_src','status','type'];

    public static function getResourcesForFilters($searchKey){

        return  Resource::where('title','like','%'.$searchKey.'%')->orderBy('id','desc')->paginate(env("RECORDS_PER_PAGE"));
    }

}
