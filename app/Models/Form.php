<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['display_name','link','status'];

    public static function getFormForFilters($searchKey){
        return Form::where('display_name','like','%'.$searchKey.'%')
        ->paginate(env("RECORDS_PER_PAGE"));
    }

}
