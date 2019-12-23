@extends('layouts.master')

@section('title')
	Sylhet Tourism
@endsection

@section('content')

<div class="section-1">
        <div class="container text-center">
            <h1 class="heading-1"> Travel Beautiful Places </h1>
            <h1 class="heading-2"> & Enjoy </h1>
            <p class="para-1"> All The Fantastic Places are here. All The Informations are given of each places.</p>

@foreach($posts->chunk(3) as $productChunk)

<div class="row justify-content-center text-center mb-5">
  @foreach($productChunk as $product)
  <div class="col-md-4 col-sm-12"> 
                    <div class="card card-product shadow">
                        <div class="img-wrap">    
                        <img src="{{URL::asset($product->image)}}" alt="An Image" class="card-img-top"/>
                        </div>
                        <figcaption class="info-wrap mb-3">
                            <h4 class="card-title"> {{ $product->title }} </h4>
                            <p class="card-text"> {{ $product->howToGoEng }} </p>
                        </figcaption>

                        <a href="{{'/tourDetails/'.$product->id}}" class="btn btn-primary">See Full Details</a>
                    </div>
                    

</div>
                

@endforeach    
  </div>
@endforeach
</div>
</div>
    
@endsection

