<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Image;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as CompressImage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('view_gallery');

        if ($hasPermission) {


            $searchKey = $request->searchKey;
            $selectedCategory = $request->selected_category;
            $galleries = Image::getImageForFilters($request);

            $gallery_categories = Category::where('type',2)->get();

            $galleries->appends(request()->query())->links();

            return view('admin.galleries.all_galleries',compact('galleries','searchKey','selectedCategory','gallery_categories'));
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function store(Request $request){

        $hasPermission = Auth::user()->hasPermission('add_gallery');

        if($hasPermission){

            $galleryImage = $request->image;

            if($galleryImage != null){

                $destinationPath = "images/uploads/gallery/";                                
                $imageName =  date("YmdHis").'_'. $galleryImage->getClientOriginalName();                      
                        
                // Open and resize the image
                $image = CompressImage::make($galleryImage->getRealPath());
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                         
                // Save the compressed image
                $image->save($destinationPath . $imageName, 50);
                       
                $newImage = new Image();
                $newImage->type = null;
                $newImage->src = $destinationPath . $imageName;
                $newImage->entity = 'gallery';
                $newImage->entity_id = null;
                $newImage->category_id = $request->category_id;
                $newImage->status = $request->status;

                $newImage->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Image uploaded successfully !'
            ]);

             
        }else{

            return response()->json([
                'status' => false,
                'message' => 'Permission denied'
            ]);

        }

    }


    // public function store(Request $request){



    //     $hasPermission = Auth::user()->hasPermission('add_gallery');

    //     if($hasPermission){


    //             $validated = $request->validate([
    //                 // 'title' => ['required', 'max:255'],
    //                 'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
    //                 'status' => ['required'],
    //                 'category_id' => ['required'],

    //             ],
    //             [
    //                 'images.*.required' => 'Gallery image required.',
    //                 'images.*.mimes' => 'Image types should be jpg,png,jpeg.',
    //                 // 'images.*.dimensions' => 'Please upload the images with the mentioned image dimentions.',
    //                 'images.*.max' => 'Please upload an imagee less than 2MB',

    //             ]);

    //             $count = 0;

    //             if(isset($request->images)){

    //                 foreach($request->images as $galleryImage){

    //                     $destinationPath =
    //                             "images/uploads/gallery/"; 
                               
    //                     $imageName =  date("YmdHis").'_'.$count . $galleryImage->getClientOriginalName();
    //                     // $galleryImage->move(public_path('images/uploads/gallery/'), $imageName);
    //                     // $imageUrl = 'images/uploads/gallery/' . $imageName;
                        
    //                      // Open and resize the image
    //                      $image = CompressImage::make($galleryImage->getRealPath());
    //                      $image->resize(800, null, function ($constraint) {
    //                          $constraint->aspectRatio();
    //                          $constraint->upsize();
    //                      });
                         
    //                      // Save the compressed image
    //                     $image->save($destinationPath . $imageName, 50);
                       
    //                     $newImage = new Image();
    //                     $newImage->type = null;
    //                     $newImage->src = $destinationPath . $imageName;
    //                     $newImage->entity = 'gallery';
    //                     $newImage->entity_id = null;
    //                     $newImage->category_id = $request->category_id;
    //                     $newImage->status = $request->status;

    //                     $newImage->save();
    //                     $count++;


    //                 }

    //             }


    //             return back()->with('success','Gallery image created successfully !');



    //     }else{

    //         return redirect('admin/not_allowed');

    //     }


    // }

    public function deleteGallery($id)
    {

        $hasPermission = Auth::user()->hasPermission('remove_gallery');

        if ($hasPermission) {

            try {


                $deleted = Image::where('id', $id)->delete();

                if ($deleted) {
                    return back()->with('success', 'Gallery image  deleted successfully !');
                } else {

                    return back()->with('error', 'Could not delete the Gallery image  !');
                }
            } catch (\Exception $exception) {
                return back()->with('error', 'Error occured - ' . $exception->getMessage());
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function updateGallery(Request $request, $id)
    {

        $hasPermission = Auth::user()->hasPermission('update_sponsors');

            if($hasPermission){

                $validated = $request->validate([
                    'title' => ['max:255'],
                    'src' => 'image|mimes:jpg,png,jpeg,gif,svg|max:11000000',
                    'status' => ['required'],
                    'category_id' => ['required'],

                ],
                [
                    'src.required' => 'Category image required.',
                    'src.mimes' => 'Image types should be jpg,png,jpeg.',
                    // 'src.dimensions' => 'Please upload the images with the mentioned image dimentions.',
                    'src.max' => 'Maximum allowed image size is 10MB',

                ]);



                $gallery = Image::where('id',$id)->get()->first();

                if($gallery != null){
                    $gallery->category_id = $request->category_id;
                    $gallery->alt_text = $request->title;
                    $gallery->status = $request->status;

                    if($request->file('src')){

                        $destinationPath =
                                "images/uploads/gallery/"; 
                               
                        $imageName =  date("YmdHis").'_'. $request->src->getClientOriginalName();
                        // $galleryImage->move(public_path('images/uploads/gallery/'), $imageName);
                        // $imageUrl = 'images/uploads/gallery/' . $imageName;
                        
                         // Open and resize the image
                         $image = CompressImage::make($request->src->getRealPath());
                         $image->resize(800, null, function ($constraint) {
                             $constraint->aspectRatio();
                             $constraint->upsize();
                         });
                         
                         // Save the compressed image
                        $image->save($destinationPath . $imageName, 50);

                        // $imageName = time().'.'.$request->src->extension();
                        // $request->src->move(public_path('images/uploads/gallery/'.$request->year.'/'.$request->month.'/'), $imageName);
                        // $imageUrl = 'images/uploads/gallery/'.$request->year.'/'.$request->month.'/' . $imageName;
                        $gallery->src = $destinationPath . $imageName;
                    }


                    $gallery->save();

                    return back()->with('success',"Gallery image  updated successfully !");

                }else{

                    return back()->with('error',"Could not find the Gallery image  !");
                }

            }else{

                return redirect('admin/not_allowed');
            }

    }

    //bulk delete images
    public function bulkDeleteImages(Request $request){

        $hasPermission = Auth::user()->hasPermission('remove_gallery');

        if ($hasPermission) {

            try {

                $itemIds = explode(',',$request->bulk_delete_items);
                $itemIds = array_filter($itemIds);

                if(sizeof($itemIds) > 0){

                    Image::whereIn('id',$itemIds)->delete();

                    return back()->with('success','Selected images removed successfully !');

                }else{

                    return back()->with('error', 'No images seletced. Please select the images to delete');
                }



            } catch (\Exception $exception) {

                return back()->with('error', 'Error occured - ' . $exception->getMessage());
            }

        } else {

            return redirect('admin/not_allowed');
        }
    }
    


}
