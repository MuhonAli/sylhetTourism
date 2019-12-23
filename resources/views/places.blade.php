@extends('layouts.master')

@section('title')
Sylhet Tourism 
@endsection

@section('content')

<div class="section-1">

    <h1 class="heading-1 text-center"> Beautiful Places </h1><hr><br>
  <div class="container text-center">
        @if (Session::has('search'))
<div class="alert alert-success" role='alert'>
  <strong>{{ Session::get('search')}}</strong>
</div>
@endif
    @foreach($places->chunk(3) as $placeChunk)

    <div class="row justify-content-center text-center mb-5">
      @foreach($placeChunk as $place)
      <div class="col-md-4 col-sm-12"> 
        <div class="card card-product shadow">
          <div class="img-wrap">    
            <img src="{{asset('/images/' . $place->image)}}" alt="An Image" class="card-img-top" height="200px;" />
          </div>
          <figcaption class="info-wrap mb-3">
            <h4 class="card-title"> {{ $place->title }} </h4>
            <p class="card-text"> {{ $place->howToGoEng }} </p>
          </figcaption>

          <a href="{{'/placeDetails/'.$place->id}}" class="btn btn-primary">See Details</a>
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
  {{ $places->links() }}
</div>
@endsection
@section('footer')

@include('footer')

@endsection
