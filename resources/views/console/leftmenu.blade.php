        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-faded" id="sidebar" role="navigation">
            <ul class="nav flex-column pl-1 nav-pills">

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='dashboard' ? ' active' : '') }}" href="/console">Inicio</a></li>

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='listings' ? ' active' : '') }}" href="/console/listings">Lotes</a></li>

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='comments' ? ' active' : '') }}" href="/console/comments">Comentarios</a></li>

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='offers' ? ' active' : '') }}" href="/console/offers">Ofertas</a></li>

            @if(auth()->user()->isAdmin())
                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='breeds' ? ' active' : '') }}" href="/console/breeds">Razas</a></li>    

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='categories' ? ' active' : '') }}" href="/console/categories">Categorias</a></li>

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='paymentmethods' ? ' active' : '') }}" href="/console/paymentmethods">Métodos de pago</a></li>

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='users' ? ' active' : '') }}" href="/console/users">Usuarios</a></li>

                <li class="nav-item"><a class="nav-link{{ ($_active_menu=='template' ? ' active' : '') }}" href="/console/template">Template</a></li>
            @endif
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="collapse" data-target="#submenu1">Otros <i class="fa fa-chevron-down"></i></a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="">Sub item</a></li>
                       <li class="nav-item"><a class="nav-link" href="">Sub item</a></li>
                    </ul>
                </li>
            </ul>
        </div>