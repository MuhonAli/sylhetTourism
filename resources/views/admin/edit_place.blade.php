@extends('layouts.master')

@section('title')
	Sylhet Tourism
@endsection

 @if(Auth::user()->hasAnyRole('admin'))      
    @include('admin.adminSidebar')
@endif

@section('content')
    @if (Session::has('place'))
<div class="alert alert-success" role='alert'>
  <strong>{{ Session::get('place')}}</strong>
</div>
@endif
<div class="m-5">
        <div class="container col-md-8">
          <div class="row">

            <div class="col-md-4">
              <div id="bekaar"> </div>
            </div>
            <div class="col-md-8">
              <form method="POST" action="{{'/addNewPlace'}}" enctype="multipart/form-data">
                @csrf
                  <h3>Add New Place</h3>
                  <br/>
                  <div class="form-group">
                  <label>Title</label>
                  <input type="text"
                  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                    id="title" placeholder="Add a Title" name="title" required/>
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
                  name="image" id="image" required/>
                  @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                  @endif
                </div>

                <div class="form-group">
                <label>How to go there (English) </label>
                <textarea class="form-control{{ $errors->has('howToGoEng') ? ' is-invalid' : '' }}"
                   name="howToGoEng" id="howToGoEng" rows="3" required></textarea>
                  @if ($errors->has('howToGoEng'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('howToGoEng') }}</strong>
                        </span>
                  @endif
                </div>

                <div class="form-group">
                <label>Where To Stay (English) </label>
                <textarea class="form-control{{ $errors->has('whereToStayEng') ? ' is-invalid' : '' }}"
                   name="whereToStayEng" id="whereToStayEng" rows="3" required></textarea>
                  @if ($errors->has('whereToStayEng'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('whereToStayEng') }}</strong>
                        </span>
                  @endif
                </div>

                <div class="form-group">
                <label>Where To Eat (English) </label>
                <textarea class="form-control{{ $errors->has('whereToEatEng') ? ' is-invalid' : '' }}"
                   name="whereToEatEng" id="whereToEatEng" rows="3" required></textarea>
                  @if ($errors->has('whereToEatEng'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('whereToEatEng') }}</strong>
                        </span>
                  @endif
                </div>

                
                <div class="form-group">
                <label>How to go there (Bangla) </label>
                <textarea class="form-control{{ $errors->has('howToGoBan') ? ' is-invalid' : '' }}"
                   name="howToGoBan" id="howToGoBan" rows="3" required></textarea>
                  @if ($errors->has('howToGoBan'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('howToGoBan') }}</strong>
                        </span>
                  @endif
                </div>

                <div class="form-group">
                <label>Where To Stay (Bangla) </label>
                <textarea class="form-control{{ $errors->has('whereToStayBan') ? ' is-invalid' : '' }}"
                   name="whereToStayBan" id="whereToStayBan" rows="3" required></textarea>
                  @if ($errors->has('whereToStayBan'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('whereToStayBan') }}</strong>
                        </span>
                  @endif
                </div>

                <div class="form-group">
                <label>Where To Eat (Bangla) </label>
                <textarea class="form-control{{ $errors->has('whereToEatBan') ? ' is-invalid' : '' }}"
                   name="whereToEatBan" id="whereToEatBan" rows="3" required></textarea>
                  @if ($errors->has('whereToEatBan'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('whereToEatBan') }}</strong>
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