<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use SoapClient;

class PremioController extends Controller{


    public function GetPrizesRequest(){
        $sessionID = Session::get('sessionID');
        $client = new SoapClient(env('SOAP_CLIENT_URL'));
   
        $params = [
           "sessionID" => $sessionID,
           "prize_ID" => "",
           "catalog_ID" => "",
           "code" => "",
           "category_ID" => "",
           "stock" => "",
           "onlyOutstandingPrize" => "",
           "onlySeasonal" => "",
           "filterKindSeenAndRedeemed" => "",
           "lastDays" => "",
           "prizesCount" => "",
           "pagination" => [
               "InitLimit" => 0,
               "rowCount" => 20,
               "orders" => [
                   "criteria" => "",
                   "columnName" => ""
               ],
               "recordsTotal" => "",
               "actualPage" => "",
               "totalPages" => ""
           ],
       ];
       $response = $client->GetPrizes($params);
       if ($response){
           /* Valida que los productos tienen stock y que este activo */
           $validatedPrizes = $this->getvalidPrizes($response->PrizeList);
          
       }else{
           $validatedPrizes = "No prizes";
       }
       
       return $validatedPrizes;
           
       }
   
       public function getvalidPrizes($prizes){
           $validatedPrizes = array();
           foreach($prizes as $prize ){
               if ($prize->stock > 0 && $prize->flags->enabled === true) {
                   $validatedPrizes[] = $prize;
               }else{
                   $validatedPrizes = [
                       "id" => 404,
                       "name" => "No hay premos validos",
                       
                   ];
               }
           }
           return $validatedPrizes;
       }
       public function getPointsRequest($premios){
           $colecciónPremios = collect($premios);
           $minPuntos = $colecciónPremios->min('points');
           $maxPuntos = $colecciónPremios->max('points');
   
           $puntos = array(
               "minPuntos" => $minPuntos,
               "maxPuntos" => $maxPuntos
           );
   
   
           return $puntos;
           
       }

   
   
    public function getCatalogsRequest($premios){
        $sessionID = Session::get('sessionID');
        $client = new SoapClient(env('SOAP_CLIENT_URL'));
        $params = [
            "sessionID" => $sessionID,
            "dateFrom" => "",
            "dateTo" => "",
            "pagination" => [
                "InitLimit" => 0,
                "rowCount" => 20,
                "orders" => [
                    "criteria" => "",
                    "columnName" => ""
                ],
                "recordsTotal" => "",
                "actualPage" => "",
                "totalPages" => ""
            ]   
        ];
        $response = $client->GetCatalogs($params);
        if($response){
            $validatedCatalogs = $this->GetValidatedCatalogs($response->catalogList, $premios);
        }
        return $validatedCatalogs;


      
       

    }

    public function GetValidatedCatalogs($catalogs,$premios){


        $validatedCatalogs = [];
        foreach($catalogs as $catalog){
            if($catalog->flags->enable === true ){
                $validatedCatalogs[] = $catalog;
            }
        }
        $catalogosValidos = collect($validatedCatalogs)->filter(function ($catalogo) use ($premios) {
            foreach ($premios as $premio) {
                if ($premio->catalogId == $catalogo->id) {
                    return true;
                }
            }
            return false;
        });
        

        return $catalogosValidos;

    }


    public function getPrizesCategoriesRequest($premios){
        $sessionID = Session::get('sessionID');
        $client = new SoapClient(env('SOAP_CLIENT_URL'));

        $params = [
            "sessionID" => $sessionID,
            "onlyOutstandingPrizeCategory" => "",
            "pagination" => [
                "InitLimit" => 0,
                "rowCount" => 20,
                "orders" => [
                    "criteria" => "",
                    "columnName" => ""
                ],
                "recordsTotal" => "",
                "actualPage" => "",
                "totalPages" => ""
                
            ],
            "filterPrize" =>""   
        ];
        $response = $client->GetPrizesCategories($params);
        if ($response){
            $categoriesValidated = $this->GetRelationCategories($response->categoryList, $premios);
        }
        return $categoriesValidated;
       

     

    }

    public function GetRelationCategories($categorias,$premios){

        $validatedCategories = [];
        $validatedCategories = collect($categorias)->filter(function ($categoria) use ($premios) {
            foreach ($premios as $premio) {
                if ($premio->categoryId == $categoria->id) {
                    return true;
                }
            }
            return false;
        });
        

        return $validatedCategories;

    }

    public function getInfo(){

        $sessionID = Session::get('sessionID');
        if(isset($sessionID) && $sessionID!= ''){
            $premios = $this->GetPrizesRequest();
            $catalogos = $this->getCatalogsRequest($premios);
            $categorias = $this->getPrizesCategoriesRequest($premios);
            $puntos = $this->getPointsRequest($premios);
           return view('welcome')->with('premios', $premios)->with('categorias', $categorias)->with('catalogos', $catalogos)->with('puntos', $puntos);
        }else{
            return redirect("/login");
        }
        
    }

}
