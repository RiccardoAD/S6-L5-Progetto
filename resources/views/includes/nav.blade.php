<nav class="navbar navbar-expand-md bg-color">
  <div class="container-fluid">
    <a class="navbar-brand ms-3" href="{{route('welcome')}}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active size-s" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active size-s" aria-current="page" href="{{route('activities.index')}}">List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('activities.create')}}"><i class="bi bi-plus-circle-dotted size-s"></i></i></a>
        </li>
      {{-- @auth
      <li  class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}"> Dashboard</i></i></a>
      </li>
      @endauth --}}
       
        
        
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchTerm">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </form>
      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
            {{-- se utente loggato --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            {{-- altrimenti, se l'utente non è loggato --}}
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                    Login
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                    Register
                </a>
            </li>
        @endauth
    </ul>

    </div>
  </div>
</nav>