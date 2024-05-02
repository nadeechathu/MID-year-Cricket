<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['title','src','status'];

    public static function getSponsorsForFilters($searchKey){
        return Sponsor::where('title','like','%'.$searchKey.'%')
        ->orderBy('id', 'desc')
        ->paginate(env("RECORDS_PER_PAGE"));
    }
}
