<?php

        $productElement = [

        array(
            "img" => "https://www.aexp-static.com/ecpglobal/ecatalogue/es-mx/rewards/membership-rewards/getcatalogimage.mtw?productid=26609155&catalogid=131073&languageid=es_mx&imagetype=RectangleLarge&imagever=1779359&hash=a4d50e12f36566dcb33b08eab8fecda8&useparentasdefault=true",
            "title" => "CERTIFICADO STARBUCKS $100",
            "points" => "98",
            "url" => "#"
        ),

        array(
            "img" => "https://www.aexp-static.com/ecpglobal/ecatalogue/es-mx/rewards/membership-rewards/getcatalogimage.mtw?productid=26580995&catalogid=131073&languageid=es_mx&imagetype=RectangleLarge&imagever=1779290&hash=0f766cf383eca9db81beb7b3df9657a7&useparentasdefault=true",
            "title" => "CERTIFICADO LIVERPOOL $500",
            "points" => 603,
            "url" => "#"
        ),

        array(
            "img" => "https://www.aexp-static.com/ecpglobal/ecatalogue/es-mx/rewards/membership-rewards/getcatalogimage.mtw?productid=26580995&catalogid=131073&languageid=es_mx&imagetype=RectangleLarge&imagever=1779290&hash=0f766cf383eca9db81beb7b3df9657a7&useparentasdefault=true",
            "title" => "Almohada Sognare blanca Standar Suave",
            "points" => 699,
            "url" => "#"
        ),
        array(
            "img" => "https://static.wixstatic.com/media/f96ca3_ba4091ebe04b4b238dd1d0f27f63f3fb~mv2.jpg/v1/fill/w_561,h_420,al_c,q_85,usm_0.66_1.00_0.01/f96ca3_ba4091ebe04b4b238dd1d0f27f63f3fb~mv2.webp",
            "title" => "Bateria De Cocina Priminute 12 Piezas Acero",
            "points" => 984,
            "url" => "#"
        ),
        array(
            "img" => "https://http2.mlstatic.com/D_NQ_NP_823391-MLM49265600879_032022-O.webp",
            "title" => "Crepera T-Fal 25 Cm Negro B3511082",
            "points" => 331,
            "url" => "#"
        ),
        ];
?>
<div class="container-fluid rounded border border-gray my-2 my-lg-4">
    <h3 class="my-3 text-sm ">PRODUCTOS MÁS CANJEADOS</h3>

    @foreach ($productElement as $product)
    <div class="row text-sm">
        <div class="col-12">
            <div class="row">
                <div class="col col-lg-3">
                    <img class="w-100 mx-auto text-center pt-2" src="{{ $product['img'] }}" alt="{{ $product['title'] }}">
                </div>
                <div class="col col-lg-9 text-gray pe-2">
                    <p class="fw-bold text-xs mb-0"> {{ $product['title'] }} </p>
                    <p class="text-xs"> {{ $product['points'] }} puntos</p>
                    <a class="d-flex" href="{{ $product['url'] }}">
                        <p class="fw-light text-gray ">Ver más</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill mx-1 pt-1 text-gray" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
