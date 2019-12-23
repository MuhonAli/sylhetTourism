<nav class="navbar navbar-expand-lg navbar-light navBar shadow-sm">
  <a class="navbar-brand" href="/"><i class="fa fa-road" aria-hidden="true"></i>Sylhet Tourism <span></span>
</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle Navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse"></div>
  
  <div class="collapse navbar-collapse" id="navbarMenu">
    <form style="margin-left: 10%;" class="form-inline my-2 my-lg-0 mr-auto"  method="POST" action="{{'/search'}}">
      @csrf
      <input class="form-control mr-sm-2 roundedBorder" type="search" placeholder="Search.." aria-label="Search" name="search"><!-- 
      <button class="btn btn-outline-info my-2 my-sm-0 roundedBorder" type="submit"><span class="glyphicon glyphicon-search"></span> </button> -->
    </form>
    <ul class="navbar-nav">
<!--     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Lists
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li> <a class="nav-link" href="/hotels">Place To Stay</a></li>
          <li> <a class="nav-link" href="/restaurants">Place To Eat</a></li>
          <li class="dropdown-submenu"><a class="nav-link dropdown-item dropdown-toggle" href="#">Place To Visit</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/tourDetails/1">Bisnakandi</a></li>
              <li><a class="dropdown-item" href="/tourDetails/2">Jaflong</a></li>
              <li><a class="dropdown-item" href="#">Jadukata River</a></li>
              <li><a class="dropdown-item" href="#">Hajrath Shah jalal Majar Sharif</a></li>
            </ul>
          </li>
        </ul>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="/places">Places</a>
        </li>

<li class="nav-item">
        <a class="nav-link" href="/hotels">Hotels</a>
</li>

<li class="nav-item">
        <a class="nav-link" href="/restaurants">Restaurants</a>
        </li>

      @guest
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      @else
      <li>
        <a class="nav-link" href="/home">
          {{ Auth::user()->name }}  
        </a>
      </li>
      <li>
          <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      </li>
                          
      @endguest

      
    </ul>

  </div>
  
</nav>
    @if (Session::has('comments'))
<div class="alert alert-danger" role='alert'>
  <strong>{{ Session::get('comments')}}</strong>
</div>
@endif