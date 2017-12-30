<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiContoller extends Controller
{
    public function createUser(Request $request){

        $client = new Client();
        $res = $client->request('POST', 'http://'.$request['ip'].'/api',[
            'body' => [
                'devicetype' => ''
            ]
        ]);

        // echo $res->getStatusCode(); // 200
         $res->getBody();
    }

    public function aux(Request $request){
        $res = $client->request('PUT', 'http://'.$request['ip'].'/api',[

        ]);
    }
}
