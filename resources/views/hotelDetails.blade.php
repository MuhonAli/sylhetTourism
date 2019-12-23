@extends('layouts.master')

@section('title')
Sylhet Tourism
@endsection

@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <p>{{ $error }}</p>
  @endforeach
</div>
@endif
<div>
  <img src="{{asset('/images/'. $hotel->image)}}" class="imageClass"/>
  <h2 class="display-4" style="font-size: 2.5rem;font-weight: 300;line-height: 1.2;text-align: center;padding: 20px;"> {{ $hotel->title }}</h2>
</div>

<div class="container mb-5">

    <div role="tabpanel" class="tab-pane active in mt-3 mb-3" id="english">
     
     <p><strong>Description : </strong> {{ $hotel->desc }}</p>
     <p><strong>Email : </strong> {{ $hotel->email }}</p>
     <p><strong>Contact : </strong> {{ $hotel->contact }}</p>
      <br/><br/>
    </div>
  <!-- Tab panes -->

<!--   @auth
  <form method="POST" class="ccard card-info" action="{{ '/addComment' }}">
    @csrf
    <div class="card-block">

      <input type="hidden" name="post_id" value="{{ $hotel->id }}"  />
      <div class="col-md-6 rate">
        <input style="display: none;" type="radio" id="star1" name="rate" value="5" required="" />
        <label for="star1" title="1 star">1 star</label>
        <input style="display: none;" type="radio" id="star2" name="rate" value="4" required="" />
        <label for="star2" title="2 stars">2 stars</label>
        <input style="display: none;" type="radio" id="star3" name="rate" value="3" required="" />
        <label for="star3" title="3 star">3 stars</label>
        <input style="display: none;" type="radio" id="star4" name="rate" value="2" required="" />
        <label for="star4" title="4 stars">4 stars</label>
        <input style="display: none;" type="radio" id="star5" name="rate" value="1" required="" />
        <label for="star5" title="5 stars">5 stars</label>
      </div>
      <textarea style="border: 1px solid gray;" placeholder="Write your comment here!" class="pb-cmnt-textarea" name="comment" required="">
      </textarea>
    </div>
    <button class="btn btn-info btn-block" type="submit">Submit</button>
  </form>
  @endauth -->

</div>
@endsection

@section('script')
<script>

  $(document).on('click', '.edit', function(){

    var id = $(this).attr('id');
    //console.log(id);
    $.ajax({
      method: 'GET',
      url: "/editedComment/"+id,
      dataType: 'json',
      success: function(html){

        console.log(html.data);
        $('#editedComment').val(html.data.comment);
        $('#comment_id').val(html.data.id);
      },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
          console.log(JSON.stringify(jqXHR));
          console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }


      });

  });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>


  .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
    margin-left: 8%;
  }

  .rate:not(:checked) > input {
    //position: absolute;
    top: -9999px;
  }

  .rate:not(:checked) > label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 30px;
    color: #ccc;
  }

  .rate:not(:checked) > label:before { content: '★ '; }

  .rate > input:checked ~ label { color: #ffc700; }

  .rate:not(:checked) > label:hover, .rate:not(:checked) > label:hover ~ label { color: #deb217; }

  .rate > input:checked + label:hover, .rate > input:checked + label:hover ~ label, .rate > input:checked ~ label:hover, .rate > input:checked ~ label:hover ~ label, .rate > label:hover ~ input:checked ~ label { color: #c59b08; }
</style>

@endsection