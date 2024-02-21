<nav class="navbar fixed-top navbar-border bg-light">
    <div class="container-fluid">

      {{-- Off-canvas Menu --}}
      <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars fa-lg"></i>
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{__('ui.navbarHello')}} @auth{{Auth::user()->name}}@endauth</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('announcements_index')}}">{{__('ui.navbarAnnouncements')}}</a>
            </li>
            
            
              <li class="nav-item position-absolute bottom-0 start-0">
                <x-_locale lang="it"/>
                <x-_locale lang="en"/>
                <x-_locale lang="es"/>
              </li>
              
            @guest
              <li>
                <a class="d-inline nav-link" href="{{route('login')}}">{{__('ui.navbarLogin')}}</a> 
                <a class="nav-link d-inline" href="{{route('register')}}">{{__('ui.navbarRegister')}}</a>
              </li>   
            @endguest
            @auth
              @if (Auth::user()->is_revisor)
                <li class="">
                  <a class="nav-link position-relative d-inline" href="{{route('revisor.index')}}">{{__('ui.navbarRevisor')}}
                    <span class="position-absolute counter-revisor badge rounded-pill bg-danger ">{{App\Models\announcement::toBeRevisionedCount()}}</span>
                    <span class="visually-hidden">{{__('ui.navbarUnread')}}</span>
                  </a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('revisor_became')}}">diventa revisore</a>
                </li>
              @endif
              <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.navbarExit')}}</a>
              </li>
              <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">@csrf</form>
            @endauth
          </ul>
        </div>
      </div>
      <a class="navbar-brand mx-auto sizelogo" href="{{route('home')}}"><img class="" style="transform: scale(0.7)" src={{asset('storage/img/logo-breeeze.png')}} alt=""></a>
      <button class="border-0 btn bg-light fa-lg "><i class="fa-solid fa-user"></i></button>
    </div>
</nav>