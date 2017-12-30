<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiContoller extends Controller
{
    public function createUser(Request $request){

        $client = new Client();
        $res = $client->request('GET', 'http://$ip/api', [

        ]);

        // echo $res->getStatusCode(); // 200
         $res->getBody();
    }
}
