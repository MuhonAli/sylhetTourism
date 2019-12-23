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
  <img src="{{asset('/images/'. $product->image)}}" class="imageClass"/>
  <h2 class="display-4" style="font-size: 2.5rem;font-weight: 300;line-height: 1.2;text-align: center;padding: 20px;"> {{ $product->title }}</h2>
</div>

<div class="container mb-5">

    <div role="tabpanel" class="tab-pane active in mt-3 mb-3" id="english">
     
     <p><strong>Description : </strong> {{ $product->desc }}</p>
     <p><strong>Email : </strong> {{ $product->email }}</p>
     <p><strong>Contact : </strong> {{ $product->contact }}</p>
      <br/><br/>
    </div>
  <!-- Tab panes -->
  <div class="tab-content ml-3">

    @auth
    @if(Auth::user()->hasAnyRole('admin'))
    <!--  <button class="btn btn-primary"> Edit </button> -->
    @endif
    @endauth
  </div>
  @foreach($comments as $comment)
  <div class="m-5 mb-0"> 
    <div class="media border p-3">
      <i class="fa fa-user mr-2" style="font-size: 38px"></i>
      <div className="media-body">
        <h4> {{ $comment->name }}</h4>
        <p class="ml-3 text-muted"> {{ date('M j, Y h:ia', strtotime($comment->updated_at)) }} </p>
        <div class="rating">
          <?php $pr=$comment->rate;
          for($i=0; $i<5; $i++){ 
            if ($i<$pr) {?> 
             <i class="fa fa-star" style="color: orange;"></i>
           <?php  }
           else{ ?>
            <i class="fa fa-star-o" ></i>
          <?php  }
        }
        ?> 
      </div>

      <p class="ml-3"> {{ $comment->comment }} </p>
      @auth
      @if(Auth::user()->id == $comment->user_id)
      <button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#myModal" id="{{ $comment->id }}">
        Edit
      </button>
      @endif
      @endauth

      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit your review</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="POST" class="ccard card-info" action="{{ '/editedComment' }}">
                @csrf
                <div class="card-block">
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
                  <textarea  class="pb-cmnt-textarea" name="editedComment" id="editedComment">
                  </textarea>
                  <input type="hidden" name="comment_id" value="" id="comment_id"/>
                </div>
                <button class="btn btn-info pull-right mb-2" type="submit">Save</button>
              </form>
            </div>

          </div>
        </div>
      </div>
      @auth
      @if(Auth::user()->id == $comment->user_id || Auth::user()->hasAnyRole('admin'))
<!-- 
        <form action = "{{'/deleteComment/'.$comment->id}}" method = "POST" class="d-inline">
          @csrf
          {{method_field('DELETE')}}
          <button class="btn btn-danger" type="submit"> Delete </button>
        </form> -->
        <a href="{{'/deleteComment/'.$comment->id}}" class="btn btn-danger">Delete</a>
        @endif
        @endauth
      </div>
    </div>
  </div>
  @endforeach
<!--   @auth
  <form method="POST" class="ccard card-info" action="{{ '/addComment' }}">
    @csrf
    <div class="card-block">

      <input type="hidden" name="post_id" value="{{ $product->id }}"  />
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