<nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-inverse mb-3">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="flex-row d-flex">
        <a class="navbar-brand mb-1" href="/">CompreGanado</a>
        <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/console">Inicio <span class="sr-only">Inicio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">La Empresa</a>
            </li>
        </ul>
        @if (Auth::check())
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item"  href="/profile">Mi Perfil</a>
              <a class="dropdown-item" href="/logout">Salir</a>
            </div>
          </li>
        </ul>
        @else
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/login">Ingresar</a>
          </li>
          </ul>
          
        @endif
    </div>
</nav>