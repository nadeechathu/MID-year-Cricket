<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;
use App\Http\Controllers\Controller;
use Auth;
use Intervention\Image\Facades\Image as CompressImage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_posts');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $posts = Post::getNewsEvetsForFilters($searchKey,0);

            return view('admin.posts.all_events',compact('posts','searchKey'));

        }else{

            return redirect('admin/not_allowed');

        }

    }
    public function newsAll(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_posts');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $posts = Post::getNewsEvetsForFilters($searchKey,1);


            return view('admin.posts.all_news',compact('posts','searchKey'));

        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function newPostUI(Request $request){

        
        $hasPermission = Auth::user()->hasPermission('add_posts');

        if($hasPermission){

            $url = url()->previous();
            $segments = explode('/',$url);
            $lastSegment = $segments[sizeof($segments) - 1];

            $newEvent = false;
            if($lastSegment == "events"){

                $newEvent = true;
            }

            $post_categories = Category::where('type',Category::POST)->get();

            return view('admin.posts.new_post',compact('post_categories','newEvent'));

        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function store(Request $request){



        $hasPermission = Auth::user()->hasPermission('add_posts');

        if($hasPermission){
            // dd($request->all());

                $validated = $request->validate([
                    'title' => ['required', 'max:255'],
                    'body' => ['required'],
                    'type' => ['required'],
                    // '' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024|dimensions:width=550,height=300',
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3072',
                    'src.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
                    'status' => ['required'],
                    // 'event_date_time' => ['required'],
                    // 'location' => ['required'],

                    'slug' => ['required','unique:posts']
                ],
                [
                    'src.*.image' => 'Uploaded file should be an image.',
                    'src.*.required' => 'Post image required.',
                    'src.*.mimes' => 'Image types should be jpg,png,jpeg.',
                    'src.*.max' => 'Please upload an imagee less than 3MB',

                    'image.image' => 'Uploaded file should be an image.',
                    'image.required' => 'Featured image required.',
                    'image.mimes' => 'Image types should be jpg,png,jpeg.',
                    'image.max' => 'Please upload an imagee less than 3MB',
                    

                ]);

                $post = new Post();

                $post->title = $request->title;
                $post->body = $request->body;
                $post->type = $request->type;
                $post->status = $request->status;
                $post->event_date_time = $request->event_date_time;
                $post->location = $request->location;
                $post->category_id = null;
                $post->user_id = Auth::user()->id;
                $post->is_approved = Post::APPROVED;
                $post->featured = $request->featured;
                $post->slug = $request->slug;

                $post->save();

                $postImage = $request->image;

                $count = 0;
                if($postImage != null){

                    $destinationPath =
                                "images/uploads/posts/"; 
                               
                    $imageName =  date("YmdHis").'_'. $postImage->getClientOriginalName();

                    // Open and resize the image
                    $image = CompressImage::make($postImage->getRealPath());
                    $image->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                         
                    // Save the compressed image
                    $image->save($destinationPath . $imageName, 50);

                    // $imageName = time().'_'.$count.'.'.$postImage->extension();
                    // $request->image->move(public_path('images/uploads/posts/'), $imageName);
                    // $imageUrl = 'images/uploads/posts/' . $imageName;

                    $newImage = new Image();

                    $newImage->type = Image::POST;
                    $newImage->src = $destinationPath . $imageName;
                    $newImage->entity = 'post';
                    $newImage->entity_id = $post->id;
                    $newImage->is_featured = 1;

                    $newImage->save();

                    $count++;
                }

                if(isset($request->images)){

                    foreach($request->images as $galleryImage){

                        $destinationPath =
                        "images/uploads/posts/"; 
                       
                        $imageName =  date("YmdHis").'_'.$count . $galleryImage->getClientOriginalName();
                        // $galleryImage->move(public_path('images/uploads/gallery/'), $imageName);
                        // $imageUrl = 'images/uploads/gallery/' . $imageName;
                        
                        // Open and resize the image
                        $image = CompressImage::make($galleryImage->getRealPath());
                        $image->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        
                        // Save the compressed image
                        $image->save($destinationPath . $imageName, 50);

                        // $imageName = time().'_'.$count.'.'.$galleryImage->extension();
                        // $galleryImage->move(public_path('images/uploads/posts/'), $imageName);
                        // $imageUrl = 'images/uploads/posts/' . $imageName;

                        $newImage = new Image();
                        $newImage->type = Image::POST;
                        $newImage->src = $destinationPath . $imageName;
                        $newImage->entity = 'post';
                        $newImage->entity_id = $post->id;
                        $newImage->save();
                        $count++;

                    }
                }


                return back()->with('success','Your post "'.$request->title.'" created successfully !');



        }else{

            return redirect('admin/not_allowed');

        }


    }

    public function editPostUI($id){



        $hasPermission = Auth::user()->hasPermission('edit_posts');

        if($hasPermission){

            $post_categories = Category::where('type',Category::POST)->get();
            $post = Post::getUserPostForId($id);

            return view('admin.posts.edit_post',compact('post_categories','post'));

        }else{

            return redirect('admin/not_allowed');

        }

    }


    public function update(Request $request){

        $hasPermission = Auth::user()->hasPermission('edit_posts');

        if($hasPermission){


                $validated = $request->validate([
                    'title' => ['required', 'max:255'],
                    'body' => ['required'],
                    'type' => ['required'],
                    'status' => ['required'],
                    'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3072',
                    'src.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3072',
                    'slug' => ['required','unique:posts,slug,'.$request->post_id]
                ],
                [
                    'image.required' => 'Featured image required.',
                    'image.mimes' => 'Image types should be jpg,png,jpeg.',
                    // 'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',
                    'image.max' => 'Please upload an imagee less than 3MB',



                    'src.*.image' => 'Uploaded file should be an image.',
                    'src.*.required' => 'Post image required.',
                    'src.*.mimes' => 'Image types should be jpg,png,jpeg.',
                    'src.*.max' => 'Please upload an imagee less than 3MB',


                ]);

                $post = Post::getUserPostForId($request->post_id);

                if($post != null){

                    $post->title = $request->title;
                    $post->body = $request->body;
                    $post->type = $request->type;
                    $post->status = $request->status;
                    $post->event_date_time = $request->event_date_time;
                    $post->location = $request->location;
                    $post->category_id = null;
                    $post->user_id = Auth::user()->id;
                    $post->is_approved = Post::APPROVED;
                    $post->featured = $request->featured;
                    $post->slug = $request->slug;

                    $post->save();

                    //updating post image
                    $imageIds = $request->image_ids;
                    $count=0;

                     if($imageIds != null){
                    foreach($imageIds as $imageId){

                        //updating images

                        $imageName = 'image_upload_'.$imageId;

                        if(isset($request->$imageName)){

                            $updateImage = Image::where('id',$imageId)->get()->first();

                            $destinationPath =
                            "images/uploads/gallery/"; 
                           
                            $imagename =  date("YmdHis").'_'. $request->imageName->getClientOriginalName();
                            
                            // Open and resize the image
                            $image = CompressImage::make($request->imageName->getRealPath());
                            $image->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            });
                            
                            // Save the compressed image
                            $image->save($destinationPath . $imagename, 50);

                            // $imgName = time().'.'.$request->$imageName->extension();
                            // $request->$imageName->move(public_path('images/uploads/posts/'), $imgName);
                            // $imageUrl = 'images/uploads/posts/' . $imgName;

                            if($updateImage == null){
                                $updateImage = new Image();

                                $updateImage->entity = 'post';
                                $updateImage->entity_id = $post->id;
                            }

                            $updateImage->src = $destinationPath . $imagename;

                            $updateImage->save();

                            $count++;
                        }
                    }
                }
                    //adding new images

                    if(isset($request->src)){

                        foreach($request->src as $galleryImage){

                            $destinationPath =
                            "images/uploads/posts/"; 
                           
                            $imageName =  date("YmdHis").'_'.$count . $galleryImage->getClientOriginalName();
                            
                            // Open and resize the image
                            $image = CompressImage::make($galleryImage->getRealPath());
                            $image->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            });
                            
                            // Save the compressed image
                            $image->save($destinationPath . $imageName, 50);

                            // $imageName = time().'_'.$count.'.'.$galleryImage->extension();
                            // $galleryImage->move(public_path('images/uploads/posts/'), $imageName);
                            // $imageUrl = 'images/uploads/posts/' . $imageName;


                            $newImage = new Image();
                            $newImage->src = $destinationPath . $imageName;
                            $newImage->entity = 'post';
                            $newImage->entity_id = $post->id;
                            $newImage->save();
                            $count++;

                        }
                    }


                    //removing images
                    if(isset($request->removed_images)){

                        $removeIds = explode(',',$request->removed_images);
                        $removeIds = array_filter($removeIds);


                        Image::whereIn('id',$removeIds)->delete();
                    }


                    //adding featured image

                    if(isset($request->image)){

                        Image::where('entity','post')->where('entity_id',$post->id)->where('is_featured',1)->delete();

                        $destinationPath =
                            "images/uploads/posts/"; 
                           
                            $imagename =  date("YmdHis").'_'. $request->image->getClientOriginalName();
                            
                            // Open and resize the image
                            $image = CompressImage::make($request->image->getRealPath());
                            $image->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            });
                            
                            // Save the compressed image
                            $image->save($destinationPath . $imagename, 50);

                        // $imageName = time().'_'.$count.'.'.$request->image->extension();
                        // $request->image->move(public_path('images/uploads/posts/'), $imageName);
                        // $imageUrl = 'images/uploads/posts/' . $imageName;

                        $updateImage = new Image();

                        $updateImage->src = $destinationPath . $imagename;
                        $updateImage->entity = 'post';
                        $updateImage->entity_id = $post->id;
                        $updateImage->is_featured = 1;

                        $updateImage->save();



                        $count++;
                    }




                    return back()->with('success','Your post "'.$request->title.'" has been updated successfully !');

                }else{
                    return back()->with('error','Could not find the post.');
                }



        }else{

            return redirect('admin/not_allowed');

        }


    }

    public function changeStatus($id){

        $hasPermission = Auth::user()->hasPermission('page_published_status_change');

        if($hasPermission){

                try{

                    $post = Post::getPostForId($id);


                    if($post != null){
                        $msg = '';

                        if($post->status == POST::UNPUBLISHED){
                            // 0 status
                            $post->status = Post::PUBLISHED;
                            $msg = "Post status changed to published status.";

                        }else{
                            // 1 status
                            $post->status = Post::UNPUBLISHED;
                            $msg = "Post status changed to unpublished status.";
                        }

                        $post->save();

                        return back()->with('success',$msg);

                    }else{
                        return back()->with('success','Could not find the post.');
                    }

                }catch(\Exception $exception){

                    return back()->with('error','Error occured - '.$exception->getMessage());
                }

        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function approvePost($id){

        $hasPermission = Auth::user()->hasPermission('approve_posts');

        if($hasPermission){

            try{

                $post = Post::getPostForId($id);


                if($post != null){

                    $post->is_approved = Post::APPROVED;

                    $post->save();

                    return back()->with('success','Post approved successfully !');

                }else{
                    return back()->with('error','Could not find the post.');
                }

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }

         }else{

            return redirect('admin/not_allowed');

        }

    }

    public function deletePost($id){

        $hasPermission = Auth::user()->hasPermission('delete_posts');

        if($hasPermission){

                try{

                    // deleting post
                    Post::where('id',$id)->delete();
                    Image::where('entity_id',$id)->delete();

                    return back()->with('success','Post deleted successfully !');

            }catch(\Exception $exception){
                return back()->with('error','Error occured - '.$exception->getMessage());
            }

         }else{

            return redirect('admin/not_allowed');

        }

    }

    public function postsToApproveUI(Request $request){

        $hasPermission = Auth::user()->hasPermission('approve_posts');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $posts = Post::getAllPostsToApprove($searchKey);

            return view('admin.posts.posts_to_approve',compact('posts','searchKey'));

          }else{

            return redirect('admin/not_allowed');

        }

    }
}
