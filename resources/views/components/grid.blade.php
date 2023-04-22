<div class="my-3 my-lg-4">
    <div id="controls" class="row my-4">
        <div class="col-12 col-lg-6">
            <div class="mb-3">
                <div id="slider"></div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-sm mb-1 mt-3">Filtrar puntos</p>
                        <p class="mb-0">
                            Desde: <span id="slider-value-min"></span> --
                            Hasta: <span id="slider-value-max"></span>
                        </p>
                    </div>
                    <button class="btn btn-light border text-xs">VER TODOS</button>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle w-100 mb-2 border text-sm" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Todos los catálogos
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>

                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle w-100 border text-start text-sm" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <button class="text-sm btn btn-light border ms-5">VER TODO</button>
                </div>

            </div>
        </div>

    </div>
    <div id="grid">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-sm">Título 1</h5>
                            <p class="card-text text-xs">Descripción 1</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-sm">Título 1</h5>
                            <p class="card-text text-xs">Descripción 1</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-sm">Título 1</h5>
                            <p class="card-text text-xs">Descripción 1</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-sm">Título 1</h5>
                            <p class="card-text text-xs">Descripción 1</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-sm">Título 1</h5>
                            <p class="card-text text-xs">Descripción 1</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{asset('img/default.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-sm">Título 1</h5>
                            <p class="card-text text-xs">Descripción 1</p>
                            <div class="overlay ">
                                <a href="#" class="bg-yellow text-white px-4 py-2">Canjea ya!</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>


    </div>
    <div id="pagination" class="m-2 m-lg-4">
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
