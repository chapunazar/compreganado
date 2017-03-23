<header class="navbar navbar-inverse navbar-toggleable-md bd-navbar mb-3"  style="background-color:#563d7c"> 
  <nav class="container">
    

    <div class="d-flex justify-content-between hidden-lg-up">
      <a class="navbar-brand" href="/">
        Tu Campo
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bd-main-nav">
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-item nav-link " href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="/">La Empresa</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://www.mercadodeliniers.com.ar/dll/agricultura1.dll/agrimerc000006" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Indices de Mercado</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" target="_blank" href="http://www.mercadodeliniers.com.ar/dll/agricultura1.dll/agrimerc000006">Liniers</a>
              <a class="dropdown-item" target="_blank" href="http://www.revistachacra.com.ar/0/seccion/index.vnc?id=especial-ganaderia">Revista Chacra</a>
            </div>
        </li>
      </ul>

     @if (Auth::check())
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item"  href="/console">Consola</a>
              <a class="dropdown-item" href="/logout">Salir</a>
            </div>
          </li>
        </ul>
        @else
          <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
           <a href="/login" class="btn btn-info" role="button">Ingresar</a>
          </li>
          </ul> 
        @endif 

      </div>
  </nav>
</header>