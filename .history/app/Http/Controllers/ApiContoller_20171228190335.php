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
                $user = $res->getBody()[0]['success']['username'];
        if($res->getStatusCode() == 200) // 200
         User::create($user);
         else
         return new Response("failed",404);

         return new Response(['user' => $user],200);
         
    }

    public function aux(Request $request){
        $res = $client->request('PUT', 'http://'.$request['ip'].'/api'/,[

        ]);
    }
}
