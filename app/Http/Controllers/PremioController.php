<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        /* Saber como esyta relacionado los catalogos con las categorias (father_id) */
        /* Saber como esta relacionado los catalogos con los premios y de acuerdo a eso filtrarlos */
        /* $categoriasFiltradas = $this->filtrarCategorias(); */
        return $response;


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
    public function getPrizesCategoriesRequest(){
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
        /* 1 Entender como estan relacionados con los catalogos */
        return $response;

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
    return $response;
        
    }


    public function getInfo(){

        $sessionID = Session::get('sessionID');
        if(isset($sessionID) && $sessionID!= ''){
            $catalogos = $this->getCatalogsRequest();
            $categorias = $this->getPrizesCategoriesRequest();
            $premios = $this->GetPrizesRequest();
           return view('welcome');
        }else{
            return redirect("/login");
        }
        
    }

}
