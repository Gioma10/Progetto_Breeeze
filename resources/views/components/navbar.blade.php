<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Breeeze</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('announcements_index')}}">Tutti gli annunci</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao
            </a>
            <ul class="dropdown-menu">
              @guest
                <li><a class="dropdown-item" href="{{route('login')}}">Ciao, accedi</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>                  
              @else
              
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Esci</a></li>
                <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">
                  @csrf
                </form>
              </ul>
            </li>
            @if (Auth::user()->is_revisor)
            <li>
             <a class="nav-link btn btn-outline-success btn-sm  position-relative" href="{{route('revisor.index')}}">Zona revisore
             <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">{{App\Models\announcement::toBeRevisionedCount()}}</span>
             <span class="visually-hidden">unread messages
   
             </span>
           </a>
            </li>
            @endif
          
       @endguest
        </ul>
    
      </div>
    </div>
  </nav>