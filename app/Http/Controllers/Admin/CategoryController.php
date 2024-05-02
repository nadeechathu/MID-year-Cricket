<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Auth;
use Intervention\Image\Facades\Image as CompressImage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_categories');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $categories = Category::getCategoriesForFilters($searchKey);

            $all_categories = Category::all();

            return view('admin.categories.all_categories',compact('categories','searchKey','all_categories'));

        }else{
           return redirect('admin/not_allowed');
        }

    }


    public function store(Request $request){


        $hasPermission = Auth::user()->hasPermission('add_categories');

        if($hasPermission){

            $validated = $request->validate([
                'category_name' => ['required', 'max:255'],
                'slug' => ['required', 'max:255'],
                'type' => ['required'],
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
            ],
            [
                'image.required' => 'Category image required.',
                'image.mimes' => 'Image types should be jpg,png,jpeg.',
                // 'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',
                'image.max' => 'Please upload an image less than 3MB',
            ]);



            $category = new Category;
            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;
            $category->slug = $request->slug;
            $category->status = Category::ACTIVE;
            $category->type = $request->type;
            $category->page_title = $request->page_title;
            $category->status = $request->status;
            $category->meta_tag_description = $request->meta_tag_description;
            $category->meta_keywords = $request->meta_keywords;
            $category->canonical_url = $request->canonical_url;

            if($request->file('image')){

                $destinationPath =
                                "images/uploads/categories/"; 
                               
                $imageName =  date("YmdHis").'_'. $request->image->getClientOriginalName();
                        
                // Open and resize the image
                $image = CompressImage::make($request->image->getRealPath());
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                         
                 // Save the compressed image
                $image->save($destinationPath . $imageName, 50);

                // $imageName = time().'.'.$request->image->extension();
                // $request->image->move(public_path('images/uploads/categories/'), $imageName);
                // $imageUrl ='images/uploads/categories/' . $imageName;


                if($request->cat_type != "1"){

                    $category->category_image = $destinationPath . $imageName;

                }else{

                    $category->sub_category_image = $destinationPath . $imageName;
                }
            }


            $savedCategory = Category::create($category->toArray());

            return back()->with('success','Category created successfully !');

        }else{
           return redirect('admin/not_allowed');
        }

    }

    public function update(Request $request){

        $hasPermission = Auth::user()->hasPermission('edit_categories');

        if($hasPermission){


                    $validated = $request->validate([
                        'category_name' => ['required', 'max:255'],
                        'slug' => ['required', 'max:255'],
                        'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3072',
                    ],
                    [

                        'image.mimes' => 'Image types should be jpg,png,jpeg.',
                        // 'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',
                        'image.max' => 'Please upload an imagee less than 3MB',

                    ]);

                    $category = Category::where('id',$request->category_id)->get()->first();

                    if($category != null){

                        $category->category_name = $request->category_name;
                        $category->category_description = $request->category_description;
                        $category->slug = $request->slug;
                        $category->type = $request->type;
                        $category->page_title = $request->page_title;
                        $category->meta_tag_description = $request->meta_tag_description;
                        $category->meta_keywords = $request->meta_keywords;
                        $category->status = $request->status;
                        $category->canonical_url = $request->canonical_url;

                        if($request->file('image')){

                            $destinationPath =
                                "images/uploads/categories/"; 
                               
                            $imageName =  date("YmdHis").'_'. $request->image->getClientOriginalName();
                                    
                            // Open and resize the image
                            $image = CompressImage::make($request->image->getRealPath());
                            $image->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            });
                                    
                            // Save the compressed image
                            $image->save($destinationPath . $imageName, 50);

                            // $imageName = time().'.'.$request->image->extension();
                            // $request->image->move(public_path('images/uploads/categories/'), $imageName);
                            // $imageUrl = 'images/uploads/categories/' . $imageName;

                            $category->category_image = $destinationPath . $imageName;
                        }

                        $category->save();

                        return back()->with('success','Category updated successfully !');

                    }else{
                        return back()->with('error','Could not find the category');
                    }




        }else{
           return redirect('admin/not_allowed');
        }

    }


    public function remove($id){

        $hasPermission = Auth::user()->hasPermission('delete_categories');

        if($hasPermission){

            try{

                Post::where('category_id',$id)->update(['category_id'=> null]);
                Image::where('entity','gallery')->where('entity_id', $id)->update(['entity_id'=> null]);

                Category::where('id',$id)->delete();

                return back()->with('success','Category removed successfully !');

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }

        }else{
           return redirect('admin/not_allowed');
        }


    }


}
