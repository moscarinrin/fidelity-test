<div class="my-3 my-lg-4">
    <div id="controls" class="row my-4">
        <div class="col-12 col-lg-6">
            <div class="mb-3">
                <div id="slider" data-min="{{ $puntos['minPuntos'] }}" data-max="{{ $puntos['maxPuntos'] }}"></div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-sm mb-1 mt-3">Filtrar puntos</p>
                        <p class="mb-0">
                            Desde: <span id="slider-value-min"></span> --
                            Hasta: <span id="slider-value-max"></span>
                        </p>
                    </div>
                    <button class="btn btn-light border text-xs filtrarPuntos">Filtrar</button>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-md-7 mb-2">
                    <select id="filtrarCatalogo"  class="filtrarCatalogo form-select btn btn-light dropdown-toggle w-100 mb-2 border text-sm"
                        aria-label="Default select example">
                        <option disabled selected value >Todos los catálogos</option>
                        @foreach ($catalogos as $catalogo)
                        <option value="{{$catalogo->id ?? 404}}">{{$catalogo->description ?? "No disponible"}}</option>
                        @endforeach

                    </select>
                    <select id="filtrarCategoria" class="filtrarCategoria form-select btn btn-light dropdown-toggle w-100 mb-2 border text-sm"
                        aria-label="Default select example">
                        <option disabled selected value>Categorias</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id ?? 404}}">{{$categoria->description }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-5 mb-2">
                    <button class="text-sm btn btn-light border ms-5 verTodo">Ver todo</button>
                </div>

            </div>
        </div>

    </div>
    <div id="grid">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($premios as $premio)
                <div class="col premio" id="" attr_puntos="{{$premio->points}}"  attr_id="{{$premio->id}}" attr_cata_id="{{$premio->catalogId}}"
                        attr_cate_id="{{$premio->categoryId}}">
                    <div class="card" >
                        <img src="{{$premio->pathImageAbsolute ?? asset('img/default.jpg')}}" class="card-img-top "
                            alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-xs">{{$premio->name ?? "Sin informacion" }}</h5>
                            <p class="card-text text-xs">{{$premio->points ?? "Sin informacion"}}</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>


    </div>
    <div id="pagination" class="m-2 m-lg-4  d-none">
        <nav aria-label="Page navigation rounded-0 ">
            <ul class="pagination  ">
                <li class="page-item"><a class="page-link text-gray" href="">1</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">2</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">3</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">4</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">5</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">6</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">7</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">8</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">9</a></li>
                <li class="page-item"><a class="page-link text-gray" href="">10</a></li>
            </ul>
        </nav>
    </div>
</div>
