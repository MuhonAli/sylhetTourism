<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Hotel;
use App\Restaurant;
use Session;
use Redirect;
use Image;


class PlaceController extends Controller
{
  public function addPlace(Request $request)
  {
    $this->validate($request,[
     'title'=>'required',
     'howToGoEng'=>'required',
     'whereToStayEng'=> 'required',
     'whereToEatEng'=> 'required',
     'howToGoBan'=> 'required',
     'whereToStayBan'=> 'required',
     'whereToEatBan'=> 'required',
     'image'=>'required'
   ]);


    $post = new Place;
    $post->title = $request->input('title');
    $post->howToGoEng = $request->input('howToGoEng');
    $post->whereToStayEng = $request->input('whereToStayEng');
    $post->whereToEatEng = $request->input('whereToEatEng');
    $post->howToGoBan = $request->input('howToGoBan');
    $post->whereToStayBan = $request->input('whereToStayBan');
    $post->whereToEatBan = $request->input('whereToEatBan');
    $post->image = $request->input('image');


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

  Session::flash('place', 'Place added successfully');
  return Redirect::back();
}

public function addHotel(Request $request)
{
  $this->validate($request,[
    'title'=>'required',
    'image'=>'required',
    'email'=> 'required',
    'contact'=> 'required',
    'desc'=> 'required'
  ]);


  $post = new Hotel;
  $post->title = $request->input('title');
  $post->image = $request->input('image');
  $post->email = $request->input('email');
  $post->contact = $request->input('contact');
  $post->desc = $request->input('desc');

  $post->save();

  return "Done!!";
}


public function showHotels()
{
  return view('/hotels');
}


public function allAddedPlace()
{
  $posts = Place::all();
  return view('/allAddedPlace',compact('posts'));
}

public function editPlace(Request $request,$id)
{
  $place = Place::find($id);
  return view('/admin/editPlace',compact('place'));
}


public function updatePlace(Request $request,$id)
{
  $place = Place::find($id);

  $place->title = $request->input('title');
  $place->howToGoEng = $request->input('howToGoEng');
  $place->whereToStayEng = $request->input('whereToStayEng');
  $place->whereToEatEng = $request->input('whereToEatEng');
  $place->howToGoBan = $request->input('howToGoBan');
  $place->whereToStayBan = $request->input('whereToStayBan');
  $place->whereToEatBan = $request->input('whereToEatBan');
        //$place->image = $request->input('image');


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
Session::flash('place', 'Place updated successfully.');
return redirect('/allAddedPlace');


}

public function delete_place($id)
{

  $place = Place::find($id);
  $place->delete();
  Session::flash('place', 'Place deleted successfully.');
  return Redirect::back();
}

}
