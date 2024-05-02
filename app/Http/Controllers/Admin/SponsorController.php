<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_sponsors');

        if($hasPermission){


            $searchKey = $request->searchKey;
               $sponsors = Sponsor::getSponsorsForFilters($searchKey);

            return view('admin.sponsors.all_sponsors',compact('sponsors','searchKey'));

        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function createSponsorsUI(){

        $hasPermission = Auth::user()->hasPermission('add_sponsors');

        if($hasPermission){

            return view('admin.sponsors.components.new_sponsors');

        }else{

            return redirect('admin/not_allowed');

        }

    }
    public function store(Request $request)
    {


        // try{

            $hasPermission = Auth::user()->hasPermission('add_sponsors');

            if($hasPermission){

                $validated = $request->validate([
                    'title' => 'required',
                    'src' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'status' => 'required',
                ],
                [
                    'src.required' => 'Sponsor image required.',
                    'src.mimes' => 'Image types should be jpg,png,jpeg.',
                    // 'src.dimensions' => 'Please upload the images with the mentioned image dimentions.',
                    'src.max' => 'Please upload an imagee less than 2MB',

                ]
            );

                $sponsor = new Sponsor;
                $sponsor->title = $request->title;
                $sponsor->status = $request->status;


            $imageUrl = null;

            if ($request->src != null) {
                $imageName = time() . '.' . $request->src->extension();
                $request->src->move(public_path('images/uploads/sponsors_logo/'), $imageName);
                $imageUrl = 'images/uploads/sponsors_logo/' . $imageName;
                $sponsor->src = $imageUrl;
            }

            Sponsor::create($sponsor->toArray());

                return redirect('admin/sponsors')->with('success',"Sponsor created successfully !");

            }else{

                return redirect('admin/not_allowed');
            }



        // }
        // catch(\Exception $exception){

        //     return back()->with('error',$exception->getMessage());
        // }
    }


    public function deleteSponsors($id){

        $hasPermission = Auth::user()->hasPermission('remove_sponsors');

        if($hasPermission){

                try{


                    $deleted = Sponsor::where('id',$id)->delete();

                    if($deleted){
                        return back()->with('success','Sponsor deleted successfully !');


                    }else{

                        return back()->with('error','Could not delete the sponsor !');


                    }


            }catch(\Exception $exception){
                return back()->with('error','Error occured - '.$exception->getMessage());
            }

         }else{

            return redirect('admin/not_allowed');

        }

    }

    public function updateSponsors(Request $request, $id)
    {


        try{

            $hasPermission = Auth::user()->hasPermission('update_sponsors');

            if($hasPermission){

                $validated = $request->validate([
                    'title' => 'required',
                    'status' => 'required',
                    'src' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

                ],
                [

                        'src.required' => 'Sponsor image required.',
                        'src.mimes' => 'Image types should be jpg,png,jpeg.',
                        // 'src.dimensions' => 'Please upload the images with the mentioned image dimentions.',
                        'src.max' => 'Please upload an imagee less than 2MB',
                ]

            );

                $sponsor = Sponsor::where('id',$id)->get()->first();

                if($sponsor != null){

                    $sponsor->title = $request->title;
                    $sponsor->status = $request->status;

                    if($request->file('src')){

                        $imageName = time().'.'.$request->src->extension();
                        $request->src->move(public_path('images/uploads/sponsors_logo/'.$request->year.'/'.$request->month.'/'), $imageName);
                        $imageUrl = 'images/uploads/sponsors_logo/'.$request->year.'/'.$request->month.'/' . $imageName;

                        $sponsor->src = $imageUrl;
                    }

                    $sponsor->save();

                    return back()->with('success',"Sponsor updated successfully !");

                }else{

                    return back()->with('error',"Could not find the Sponsor !");
                }

            }else{

                return redirect('admin/not_allowed');
            }


        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }





}
