<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('view_rule');

        if ($hasPermission) {

            $searchKey = $request->searchKey;
            $rules = Rule::getRulesForFilters($searchKey);

            return view('admin.rules.all_rules',compact('rules','searchKey'));
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function createRulesUI(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('add_rule');

        if ($hasPermission) {

            return view('admin.rules.components.new_rules');
        } else {

            return redirect('admin/not_allowed');
        }
    }
    public function store(Request $request)
    {

        try {

            $hasPermission = Auth::user()->hasPermission('add_rule');

            if ($hasPermission) {

                $validated = $request->validate(
                    [
                        'title' => 'required',
                        'description' => 'required',
                        'status' => 'required',
                        'pdf_src' => 'nullable|mimes:pdf|max:5130'
                    ]
                );

                $rule = new Rule;
                $rule->title = $request->title;
                $rule->description = $request->description;
                $rule->status = $request->status;

                if($request->pdf_src != null){
    
                    $fileName = $request->pdf_src->getClientOriginalName();
                    $request->pdf_src->move(public_path('files/uploads/rules/'), $fileName);
                    $fileUrl = 'files/uploads/rules/' . $fileName;
        
                    $rule->pdf_src = $fileUrl;
                }

                Rule::create($rule->toArray());

                return redirect('admin/rules')->with('success', "Rule created successfully !");
            } else {

                return redirect('admin/not_allowed');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }


    public function deleteRules($id){

        $hasPermission = Auth::user()->hasPermission('remove_rule');

        if($hasPermission){

                try{


                    $deleted = Rule::where('id',$id)->delete();

                    if($deleted){
                        return back()->with('success','Rule deleted successfully !');


                    }else{

                        return back()->with('error','Could not delete the Rule !');


                    }


            }catch(\Exception $exception){
                return back()->with('error','Error occured - '.$exception->getMessage());
            }

         }else{

            return redirect('admin/not_allowed');

        }

    }
    public function updateRules(Request $request, $id)
    {


        try{

            $hasPermission = Auth::user()->hasPermission('edit_rule');

            if($hasPermission){

                $validated = $request->validate([
                    'title' => 'required',
                        'description' => 'required',
                        'status' => 'required',
                        'pdf_src' => 'nullable|mimes:pdf|max:5130'

                ]

            );

                $rule = Rule::where('id',$id)->get()->first();

                if($rule != null){

                    $rule->title = $request->title;
                    $rule->description = $request->description;
                    $rule->status = $request->status;

                    if($request->pdf_src != null){
    
                        $fileName = $request->pdf_src->getClientOriginalName();
                        $request->pdf_src->move(public_path('files/uploads/rules/'), $fileName);
                        $fileUrl = 'files/uploads/rules/' . $fileName;
            
                        $rule->pdf_src = $fileUrl;
                    }

                    $rule->save();

                    return back()->with('success',"Rule updated successfully !");

                }else{

                    return back()->with('error',"Could not find the Rule !");
                }

            }else{

                return redirect('admin/not_allowed');
            }


        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }


}
