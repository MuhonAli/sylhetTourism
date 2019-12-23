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
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('minmax_2_7.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4"></h2>
        </div>
      </div>

      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('Furniture-Background-.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4"></h2>
        </div>
      </div>

      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('Big-Lots-Dining-Room-Tables-HD-Home-Wallpaper.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4"></h2>
        </div>
      </div>

      <!-- Slide Four - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('Romantic-Bedroom-Wallpaper-HD-1366x768-5.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4"></h2>
          
        </div>
      </div>

        <!-- Slide Five - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('IMG-4-1024x683.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-5"></h2>
          
        </div>
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
    <h1 class="heading-1">hotels in Sylhet</h1><hr><br>

    @foreach($hotels->chunk(3) as $hotelChunk)

    <div class="row justify-content-center text-center mb-5">
      @foreach($hotelChunk as $hotel)
      <div class="col-md-4 col-sm-12"> 
        <div class="card card-product shadow">
          <div class="img-wrap">    
            <img src="{{URL::asset($hotel->image)}}" alt="An Image" class="card-img-top"/>
          </div>
          <figcaption class="info-wrap mb-3">
            <h4 class="card-title"> {{ $hotel->title }} </h4>
            <p class="card-text"> {{ $hotel->howToGoEng }} </p>
          </figcaption>

          <a href="{{'/tourDetails/'.$hotel->id}}" class="btn btn-primary">See Details</a>
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
  {{ $hotels->links() }}
</div>
@endsection
@section('footer')

@include('footer')

@endsection