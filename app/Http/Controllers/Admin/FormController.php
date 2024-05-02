<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('view_forms');

        if($hasPermission){

            $searchKey = $request->searchKey;
               $forms = Form::getFormForFilters($searchKey);
            return view('admin.forms.all_forms',compact('forms','searchKey'));

        }else{

            return redirect('admin/not_allowed');

        }
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{

            $hasPermission = Auth::user()->hasPermission('add_forms');

            if($hasPermission){

                $validated = $request->validate([
                    'display_name' => 'required',
                    'link' => 'required',                 
                    'status' => 'required'
                ],
                [
                    'display_name.required' => 'Dispaly name is required'

                ]
            );

                $form = new Form;
                $form->display_name = $request->display_name;
                $form->link = $request->link;
                $form->status = $request->status;

                Form::create($form->toArray());

                return redirect('admin/forms')->with('success',"Form created successfully !");

            }else{

                return redirect('admin/not_allowed');
            }



        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        try{

            $hasPermission = Auth::user()->hasPermission('edit_forms');

            if($hasPermission){

                $validated = $request->validate([
                    'display_name' => 'required',
                    'link' => 'required',
                    'status' => 'required',

                ],
                [
                    'display_name.required' => 'This field is required.',
                ]

            );

                $forms = Form::where('id',$id)->get()->first();

                if($forms != null){

                    $forms->display_name = $request->display_name;
                    $forms->link = $request->link;
                    $forms->status = $request->status;

                    $forms->save();

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
   
        $hasPermission = Auth::user()->hasPermission('delete_forms');

        if($hasPermission){

                try{


                    $deleted = Form::where('id',$id)->delete();

                    if($deleted){
                        return back()->with('success','Form deleted successfully !');


                    }else{

                        return back()->with('error','Could not delete the form !');


                    }


            }catch(\Exception $exception){
                return back()->with('error','Error occured - '.$exception->getMessage());
            }

         }else{

            return redirect('admin/not_allowed');

        }
    }
}