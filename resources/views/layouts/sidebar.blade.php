                <nav class="bd-links" id="docsNavbarContent">
                    <div class="bd-toc-item active">
                            Filtrar por Período
                            <ol class="nav bd-sidenav">
                            @foreach($archives as $stat)
                                <li><a href="/?year={{ $stat['year'] }}&month={{ $stat['month'] }}">{{ $stat['year'] }} {{ $stat['month'] }} ({{ $stat['total'] }})</a></li>
                            @endforeach
                            </ol>
                    </div>
                    <div class="bd-toc-item active">
                            Filtrar por Raza
                            <ol class="nav bd-sidenav">
                            @foreach($breeds as $breed)
                                <li><a href="/listings/breeds/{{ $breed->id }}">{{ $breed->name }} ({{ count($breed->listings)}})</a></li>
                            @endforeach
                            </ol>
                    </div>
                    <div class="bd-toc-item active">
                            Filtrar por Categoría
                            <ol class="nav bd-sidenav">
                            @foreach($categories as $category)
                                <li><a href="/listings/categories/{{ $category->id }}">{{ $category->name }} ({{ count($category->listings)}})</a></li>
                            @endforeach
                            </ol>
                    </div>
                    <div class="bd-toc-item active">
                            Filtrar por Método de Pago
                            <ol class="nav bd-sidenav">
                            @foreach($paymentmethods as $pm)
                                <li><a href="/listings/paymentmethods/{{ $pm }}">{{ $pm }}</a></li>
                            @endforeach
                            </ol>
                    </div>
                </nav>