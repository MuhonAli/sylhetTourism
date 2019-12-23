<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Hotel;
use App\Restaurant;
use App\Comment;
use Session;
use Redirect;
use Image;


class RestaurantController extends Controller
{

    public function restaurants()
    {
        $restaurants = Restaurant::orderBy('id', 'desc')->paginate(9);
        return view('/restaurants',compact('restaurants'));
    }
    
    public function restaurantDetails($id)
    {
        $product = Restaurant::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('/restaurantDetails',compact('product', 'comments'));
    }

public function allAddedRestaurant()
{
  $restaurants = Restaurant::all();
  return view('/admin/allAddedRestaurant',compact('restaurants'));
}

public function editRestaurant(Request $request,$id)
{
  $restaurant = Restaurant::find($id);
  return view('/admin/editRestaurant',compact('restaurant'));
}


  public function addRestaurant(Request $request)
  {
    $this->validate($request,[
     'title'=>'required',
     'image'=>'required',
     'email'=> 'required',
     'contact'=> 'required',
     'desc'=> 'required'
   ]);


    $post = new Restaurant;
    $post->title = $request->input('title');
    $post->email = $request->input('email');
    $post->contact = $request->input('contact');
    $post->desc = $request->input('desc');

/*echo "<pre>";
print_r($post);
exit;*/
    $target_dir = "images/";

    $file_name = time().$_FILES["image"]["name"];
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES["image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  $post->image =$file_name;
  $post->save();

  Session::flash('restaurant', 'Restaurant added successfully');
  return Redirect::back();
}



public function updateRestaurant(Request $request,$id)
{
  $place = Restaurant::find($id);

  $place->title = $request->input('title');
  $place->email = $request->input('email');
  $place->contact = $request->input('contact');
  $place->desc = $request->input('desc');
  $target_dir = "images/";

  $file_name = time().$_FILES["image"]["name"];
  $target_file = $target_dir . basename($file_name);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
// Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    $place->image = $file_name;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$place->save();
Session::flash('restaurant', 'Restaurant updated successfully');
return redirect('/allAddedRestaurant');


}


public function delete_restaurant($id)
{

  $place = Restaurant::find($id);
  $place->delete();
  Session::flash('restaurant', 'Restaurant deleted successfully.');
  return Redirect::back();
}

}
