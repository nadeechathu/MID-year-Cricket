<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Auth;

class ResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_resources');

        if ($hasPermission) {


            $searchKey = $request->searchKey;
            $resources = Resource::getResourcesForFilters($searchKey);

            return view('admin.resources.all_resources', compact('resources', 'searchKey'));
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function store(Request $request){

        $hasPermission = Auth::user()->hasPermission('add_resources');

        if ($hasPermission) {

            $validated = $request->validate([
                'title' => ['required', 'max:255'],
                'pdf_src' => ['nullable','mimes:pdf','max:5130'],
                'status' => ['required'],
                'type' => ['required']

            ]);

            $resource = new Resource;

            $resource->title = $request->title;
            $resource->description = $request->description;
            $resource->status = $request->status;
            $resource->type = $request->type;

            if ($request->pdf_src != null) {
                $fileName = time() . '.' . $request->pdf_src->extension();
                $request->pdf_src->move(public_path('documents/resources/'), $fileName);
                $fileName = 'documents/resources/' . $fileName;
                $resource->pdf_src = $fileName;
            }

            Resource::create($resource->toArray());

            return back()->with('success','Record added successfully !');


        } else {

            return redirect('admin/not_allowed');
        }

    }

    public function update(Request $request){

        $hasPermission = Auth::user()->hasPermission('edit_resources');

        if ($hasPermission) {

            $validated = $request->validate([
                'title' => ['required', 'max:255'],
                'pdf_src' => ['nullable','mimes:pdf','max:5130'],
                'status' => ['required'],
                'type' => ['required']

            ]);

            $resource = Resource::where('id',$request->resource_id)->get()->first();

            if($resource != null){


                $resource->title = $request->title;
                $resource->description = $request->description;
                $resource->status = $request->status;
                $resource->type = $request->type;

                if ($request->pdf_src != null) {
                    $fileName = time() . '.' . $request->pdf_src->extension();
                    $request->pdf_src->move(public_path('documents/resources/'), $fileName);
                    $fileName = 'documents/resources/' . $fileName;
                    $resource->pdf_src = $fileName;
                }

                $resource->save();

                return back()->with('success','Record updated successfully !');

            }else{

                return back()->with('error','Could not find record to update !');
            }


        } else {

            return redirect('admin/not_allowed');
        }

    }

    public function delete($id){

        $hasPermission = Auth::user()->hasPermission('delete_resources');

        if ($hasPermission) {

            $resource = Resource::where('id',$id)->get()->first();

            if($resource != null){

                $resourceDeleted = Resource::where('id',$id)->delete();

                if($resourceDeleted){

                    return back()->with('success','Record deleted successfully !');

                }else{
                    return back()->with('error','Unable to delete the record !');
                }

            }else{
                return back()->with('error','Could not find record to delete !');

            }


        } else {

            return redirect('admin/not_allowed');
        }

    }
}
