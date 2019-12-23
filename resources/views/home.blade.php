@extends('layouts.master')

@section('content')



<div class="container-fluid p-0" id="main">

@if(Auth::user()->hasAnyRole('admin'))      
    @include('admin.adminSidebar')

<div class="row mediaMargin">
  <div class="col-sm-12 mt-5">
    <h3>User Profile</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    
                <tr>
                        
                  <th>Name</th>
                  <td>{{ Auth::user()->name }}</td>    
                        
                </tr>

                <tr>
                        
                  <th>Email</th>
                  <td>{{ Auth::user()->email }}</td>    
                              
                </tr>
                      

                </tbody>
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
