@extends('layouts.master')

@section('content')



<div class="container-fluid p-0" id="main">



@if(Auth::user()->hasAnyRole('admin'))      
    @include('admin.adminSidebar')

<div class="row mediaMargin">
  <div class="col-sm-12 mt-5">
    <h3 class="text-center">Manage Places</h3>
    @if (Session::has('place'))
<div class="alert alert-success" role='alert'>
  <strong>{{ Session::get('place')}}</strong>
</div>
@endif
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Place Name</th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

@foreach($posts->chunk(3) as $productChunk)
  @foreach($productChunk as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td> {{ $product->title }}</td>
                    <td><img src="{{URL::asset('/images/' .$product->image)}}" style="height: 60px;width: 100px;" alt="mage" class="card-img-top"/></td>
                    <td>  <a href="{{'/placeDetails/'.$product->id}}">Details</a></td>
                    <td ><a href="{{'/editPlace/'.$product->id}}">Edit</a></td>
                    <td><a href="{{'/delete_place/'.$product->id}}">Delete</a></td>
                </tr>
@endforeach    
@endforeach
            </table>
        </div>
    </div>

</div>


<hr/>



@else
    <div class="row justify-content-center mt-5">
        <div>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endif
</div>
@endsection
