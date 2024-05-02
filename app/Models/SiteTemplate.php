<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['section','template_image','template_number'];

    public static function getTemplateForFilters($searchKey){

        return SiteTemplate::where('section','like','%'.$searchKey.'%')->paginate(env("RECORDS_PER_PAGE"));
    }
}
