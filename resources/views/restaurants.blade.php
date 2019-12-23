@extends('layouts.master')

@section('title')
Sylhet Tourism 
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('rice.jpg')">
      </div>

      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('439410.jpg')">

      </div>

      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('Pizza_Pics13.jpg')">
      </div>

      <!-- Slide Four - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('1.jpg')">
      </div>
      <!-- Slide Five - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('burger.jpg')">
      </div>
      <!-- Slide six - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('sorma.jpg')">
      </div>
      <!-- Slide seven - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('DSC_0038.jpg')">
      </div>
      <!-- Slide eight - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('210878.jpg')">
      </div>


    </div>
    
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>

<div class="section-1">
  <div class="container text-center">
    <h1 class="heading-1"> Restaurants in Sylhet</h1><hr><br>

    @foreach($restaurants->chunk(3) as $restaurantChunk)

    <div class="row justify-content-center text-center mb-5">
      @foreach($restaurantChunk as $restaurant)
      <div class="col-md-4 col-sm-12"> 
        <div class="card card-product shadow">
          <div class="img-wrap">    
            <img src="{{URL::asset('images/'.$restaurant->image)}}" alt="An Image" class="card-img-top"/>
          </div>
          <figcaption class="info-wrap mb-3">
            <h4 class="card-title"> {{ $restaurant->title }} </h4>
            <p class="card-text"> {{ $restaurant->howToGoEng }} </p>
          </figcaption>

          <a href="{{'/tourDetails/'.$restaurant->id}}" class="btn btn-primary">See Details</a>
        </div>


      </div>

      <style>
      .display-4{
        margin-top: -27%;
      }
    </style>                

    @endforeach    
  </div>
  @endforeach
  
</div>
</div>

<div class="col-md-4 offset-4" style="margin-left: 45%;">
  {{ $restaurants->links() }}
</div>
@endsection
@section('footer')

@include('footer')

@endsection
