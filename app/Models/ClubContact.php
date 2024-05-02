<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubContact extends Model
{
    use HasFactory;

    protected $fillable = ['club_name','competition_type','number_of_teams','contact_person','contact_phone','executive_name','designation','executive_phone','status','email'];

    public static function getClubContactForFilters($searchKey){
        return  ClubContact::where('club_name','like','%'.$searchKey.'%')
        ->orderBy('id', 'desc')
        ->paginate(env("RECORDS_PER_PAGE"));
    }

    public static function getUserClubContactForId($id){
        return  ClubContact::where('id',$id)->get()->first();
    }

    public static function getUserClubContactForFilters($request)
    {

        return  ClubContact::where('status',1)
            ->orderBy('id', 'desc')
            ->where(function ($query) use ($request) {

                if ($request->searchKey != null) {

                    $query->where('club_name', 'like', '%' . $request->searchKey . '%');

                } else {

                    $query;
                }
            })
            ->where(function ($query) use ($request) {

                if ($request->selected_title != null) {

                    $query->where('competition_type', 'like', '%' . $request->selected_title . '%');

                } else {

                    $query;
                }
            })

            ->paginate(env("RECORDS_PER_PAGE"));
    }
}
