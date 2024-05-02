<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['email','subscriber_name','type','status'];

    public static function getSubscriptionsForFilters($searchKey){

        return UserSubscription::where('email','like','%'.$searchKey.'%')       
             ->paginate(env("RECORDS_PER_PAGE"));
    }
}
