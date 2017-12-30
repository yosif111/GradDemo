<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ApiContoller extends Controller
{
    public function createUser(Request $request){

        $client = new Client();
        $res = $client->request('POST', 'http://'.$request['ip'].'/api',[
            'body' => [
                'devicetype' => 'Demo'
            ]
        ]);

        if($res->getStatusCode() == 200) // 200
         User::create($res->getBody()[0]['success']['username']);
         
    }

    public function aux(Request $request){
        $res = $client->request('PUT', 'http://'.$request['ip'].'/api'/,[

        ]);
    }
}
