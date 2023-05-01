<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use SoapClient;

class PremioController extends Controller{

   
   
    public function getCatalogsRequest(){
        $sessionID = Session::get('sessionID');
        $client = new SoapClient(env('SOAP_CLIENT_URL'));
        $params = [
            "sessionID" => $sessionID,
            "dateFrom" => "",
            "dateTo" => "",
            "pagination" => [
                "InitLimit" => 0,
                "rowCount" => 10,
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
            $validatedCatalogs = $this->GetValidatedCatalogs($response->catalogList);
        }
        return $validatedCatalogs;


        /* <fid:GetCatalogsRequest>
         <fid:sessionID>ad7b84e5-ebef-40c5-80eb-9029205334c8</fid:sessionID>
         <fid:dateFrom></fid:dateFrom>
         <fid:dateTo></fid:dateTo>
         <fid:pagination>
            <fid1:initLimit>0</fid1:initLimit>
            <fid1:rowCount>20</fid1:rowCount>
            <!--Zero or more repetitions:-->
            <fid1:orders>
               <fid1:criteria></fid1:criteria>
               <fid1:columnName></fid1:columnName>
            </fid1:orders>
            <fid1:recordsTotal></fid1:recordsTotal>
            <fid1:actualPage></fid1:actualPage>
            <fid1:totalPages></fid1:totalPages>
         </fid:pagination>
      </fid:GetCatalogsRequest>  */
       

    }

    public function GetValidatedCatalogs($catalogs){
        $validatedCatalogs = [];
        foreach($catalogs as $catalog){
            if($catalog->flags->enable === true ){
                $validatedCatalogs[] = $catalog;
            }
        }

        return $validatedCatalogs;

    }


    public function getPrizesCategoriesRequest(){
        $sessionID = Session::get('sessionID');
        $client = new SoapClient(env('SOAP_CLIENT_URL'));

        $params = [
            "sessionID" => $sessionID,
            "onlyOutstandingPrizeCategory" => "",
            "pagination" => [
                "InitLimit" => 0,
                "rowCount" => 10,
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
            $categoriesValidated = $response->categoryList;
        }
        return $categoriesValidated;
       

        /* <fid:GetPrizesCategoriesRequest>
         <fid:sessionID>ad7b84e5-ebef-40c5-80eb-9029205334c8</fid:sessionID>
         <fid:onlyOutstandingPrizeCategory></fid:onlyOutstandingPrizeCategory>
         <fid:pagination>
            <fid1:initLimit>0</fid1:initLimit>
            <fid1:rowCount>20</fid1:rowCount>
         </fid:pagination>
      </fid:GetPrizesCategoriesRequest> */

    }







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


    public function getInfo(){

        $sessionID = Session::get('sessionID');
        if(isset($sessionID) && $sessionID!= ''){
            $catalogos = $this->getCatalogsRequest();
            $categorias = $this->getPrizesCategoriesRequest();
            $premios = $this->GetPrizesRequest();
            $puntos = $this->getPointsRequest($premios);
            
           return view('welcome')->with('premios', $premios)->with('categorias', $categorias)->with('catalogos', $catalogos)->with('puntos', $puntos);
        }else{
            return redirect("/login");
        }
        
    }

}
