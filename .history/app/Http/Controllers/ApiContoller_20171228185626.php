<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiContoller extends Controller
{
    public function createUser(Request $request){

        $client = new Client();
        $res = $client->request('GET', 'http://'.$request['ip'].'/api');

        // echo $res->getStatusCode(); // 200
         $res->getBody();
    }

    public function aux(Request $request){
        $res = $client->request('POST', 'http://'.$request['ip'].'/api',[
            
        ]);
    }
}
