<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Hotel;
use App\Comment;
use Session;
use Redirect;
use Image;


class HotelController extends Controller
{

    public function hotels()
    {
        $hotels = Hotel::orderBy('id', 'desc')->paginate(9);
        return view('/hotels',compact('hotels'));
    }
    
    public function hotelDetails($id)
    {
        $product = Hotel::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('/hotelDetails',compact('product', 'comments'));
    }

public function allAddedHotel()
{
  $hotels = Hotel::all();
  return view('/admin/allAddedHotel',compact('hotels'));
}

public function editHotel(Request $request,$id)
{
  $hotel = Hotel::find($id);
  return view('/admin/editHotel',compact('hotel'));
}


  public function addHotel(Request $request)
  {
/*    $this->validate($request,[
     'title'=>'required',
     'image'=>'required',
     'email'=> 'required',
     'contact'=> 'required',
     'desc'=> 'required'
   ]);*/


    $post = new hotel;
    $post->title = $request->input('title');
    $post->email = $request->input('email');
    $post->contact = $request->input('contact');
    $post->desc = $request->input('desc');

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

  Session::flash('hotel', 'hotel added successfully');
  return Redirect::back();
}



public function updatehotel(Request $request,$id)
{
  $place = Hotel::find($id);

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
Session::flash('hotel', 'hotel updated successfully');
return redirect('/allAddedHotel');
}


public function delete_hotel($id)
{

  $place = Hotel::find($id);
  $place->delete();
  Session::flash('hotel', 'hotel deleted successfully.');
  return Redirect::back();
}

}
