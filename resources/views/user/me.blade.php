@extends('layouts.master')

@section('title')
	Sylhet Tourism
@endsection

@section('content')

<div class="container-fluid mt-2 p-0" id="main">

      
              @include('user.userSidebar')
        
            <div class="row mediaMargin">
            <div class="col-sm-12 mt-5">
              <h3>User Profile</h3>
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <tbody>
                                  
                              <tr>
                                      
                                <th>First Name</th>
                                <td>Noyeem</td>    
                                      
                              </tr>
                              
                              <tr>
                                      
                                <th>Last Name</th>
                                <td>Solmani</td>    
                                      
                              </tr>

                              <tr>
                                      
                                <th>Email</th>
                                <td>Noyeem@gmail.com</td>    
                                            
                              </tr>
                                    

                              </tbody>
                          </table>
                      </div>
                  </div>
            
            </div>
              
          
              <hr/>
  
  
          </div>

    
@endsection