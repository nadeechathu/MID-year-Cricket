<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','status','pdf_src'];

    public static function getRulesForFilters($searchKey){
        return Rule::where('title','like','%'.$searchKey.'%')
        ->orderBy('id', 'desc')
        ->paginate(env("RECORDS_PER_PAGE"));
    }
}
