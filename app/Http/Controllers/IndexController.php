<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Restaurant;
use App\Hotel;
use App\Comment;
use Session;
use Redirect;
use Auth;

class IndexController extends Controller
{
    public function index()
    {
        $places = Place::orderBy('id', 'desc')->take(6)->get();
        $restaurants = Restaurant::orderBy('id', 'desc')->take(3)->get();
        $hotels = Hotel::orderBy('id', 'desc')->take(3)->get();
        return view('/index',compact('places', 'restaurants', 'hotels'));
    }

    public function placeDetails($id)
    {
        $product = Place::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('/placeDetails',compact('product', 'comments'));
    }

    public function hotelDetails($id)
    {
        $hotel = Hotel::find($id);
        return view('/hotelDetails',compact('hotel'));
    }

    public function addComment(Request $request)
    {
        $check_data = Comment::where('post_id',$request->input('post_id'))->where('user_id',Auth::user()->id)->get();
        echo $total = count($check_data);

        if ($total>0) {
             Session::flash('comments', 'Sorry! You have already commented on this.');
            return Redirect::back();
        }
/*
        $this->validate($request,[
        	'comment'=>'required',
            'post_id'=>'required'
           ]);*/
 $this->validate($request, array(
 
            'comment'=>'required',
            'post_id'=>'required'

));

        $post = new Comment;
        $post->comment = $request->input('comment');
        $post->rate = $request->input('rate');
        $post->post_id = $request->input('post_id');
        $post->name = Auth::user()->name;
        $post->user_id = Auth::user()->id;
        $post->save();
        

        Session::flash('comments', 'Thanks for your feedback!');

        return Redirect::back();
        //redirect($_SERVER['HTTP_REFERER']);
        
    }
    public function getSearchedPlace(Request $request)
    {   
        $search = ucfirst($request->search);

        $places = Place::where('title','like', '%'.$search.'%')->orderBy('id')->paginate(30);
      Session::flash('search', 'your search result');
    	  return view('/places',compact('places'));
        
   
    	//return redirect('/')->with('message','Not Found');
    }
    
    public function places()
    {
        $places = Place::orderBy('id', 'desc')->paginate(9);
        return view('/places',compact('places'));
    }


    public function hotels()
    {
        $hotels = Hotel::orderBy('id', 'desc')->paginate(9);
        return view('/hotels',compact('hotels'));
    }


}

