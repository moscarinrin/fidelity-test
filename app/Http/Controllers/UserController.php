<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SoapClient;


class UserController extends Controller
{
    
    public function synchroAndLoginRequest()
    {
        // Crea una instancia de SoapClient
        $client = new SoapClient(env('SOAP_CLIENT_URL'));

        // Define los parámetros del método SynchroAndLoginRequest
        $params = [
            "userName" => "opHolcimMXWeb",
            "password" => "0pV3W3bH0lMX%",
            "kind" => "99"
           
        ];

        // Llama al método SynchroAndLogin del servicio web y obtiene la respuesta
        $response = $client->SynchroAndLogin($params);
        if($response->sessionID){
            Session::put('sessionID', $response->sessionID);
            return redirect('/');
        }else{
            return view('error');
        }
        
        
    }
}
