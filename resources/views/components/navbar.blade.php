<nav class="navbar fixed-top navbar-border bg-light">
    <div class="container-fluid">
      {{-- <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      
      {{-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Link with href
      </a> --}}
      
      {{-- Off-canvas Menu --}}
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Ciao @auth{{Auth::user()->name}}@endauth</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('announcements_index')}}">Tutti gli annunci</a>
            </li>
            @guest
              <li>
                <a class="d-inline nav-link" href="{{route('login')}}">Accedi / </a> 
                <a class="nav-link d-inline" href="{{route('register')}}">Registrati</a>
              </li>                  
            @endguest
            @auth
              @if (Auth::user()->is_revisor)
                <li class="">
                  <a class="nav-link position-relative d-inline" href="{{route('revisor.index')}}">Zona revisore
                    <span class="position-absolute counter-revisor badge rounded-pill bg-danger ">{{App\Models\announcement::toBeRevisionedCount()}}</span>
                    <span class="visually-hidden">unread messages</span>
                  </a>
                </li>
              @endif
              <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Esci</a>
              </li>
              <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">@csrf</form>
            @endauth
          </ul>
        </div>
      </div>
      <a class="navbar-brand mx-auto" href="{{route('home')}}"><img src="./public/storage/img/breeeze-logo.png" alt="">Breeeze</a>
      <button class=""><i class="fa-solid fa-user"></i></button>
    </div>
  </nav>