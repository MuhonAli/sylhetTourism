@extends('layouts.master')

@section('title')
  Sylhet Tourism
@endsection


 @if(Auth::user()->hasAnyRole('admin'))      
    @include('admin.adminSidebar')
@endif

@section('content')
    @if (Session::has('restaurant'))
<div class="alert alert-success" role='alert'>
  <strong>{{ Session::get('restaurant')}}</strong>
</div>
@endif
<div class="m-5">
        <div class="container col-md-8">
          <div class="row">

            <div class="col-md-4">
              <div id="bekaar"> </div>
            </div>
            <div class="col-md-8">
              <form method="POST" action="{{'/updateRestaurant/'.$restaurant->id}}" enctype="multipart/form-data">
                @csrf
                  <h3>Edit Restaurant</h3>
                  <hr>
                  <br/>
                  <div class="form-group">
                  <label>Title</label>
                  <input type="text"
                  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                    id="title" placeholder="Add a Title" value="{{ $restaurant->title }}" name="title" required/>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                  </div>
              
                <div class="form-group">
                  <label>Add an Image File</label>
                  <input type="file"
                  class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                  name="image" id="image" />
                  @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text"
                  class="form-control" name="email" id="email" value="{{ $restaurant->email }}" required/>
                </div>

                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="text"
                  class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                  name="contact" id="contact" value ="{{ $restaurant->contact }}" required/>
                  @if ($errors->has('contact'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                  @endif
                </div>

                  <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}"
                   name="desc" id="desc" rows="3" required>{{ $restaurant->desc }}</textarea>
                    @if ($errors->has('desc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                    @endif

                  </div>
                


                <button type="submit" class="btn btn-info">Submit</button>
              </form>
              </div>
              </div>
              </div>
    </div>

@endsection