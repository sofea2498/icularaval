<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Project Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">About</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('auth.logout')}}">Log Out</a>
          </li>  --}}
    
        </ul>

         <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{route('auth.logout')}}">Log Out</a>
              </li>
            @endauth

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route('auth.signin')}}">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('auth.signUp')}}">Sign Up</a>
              </li>
            @endguest
         </ul>
      </div>
    </div>
  </nav>