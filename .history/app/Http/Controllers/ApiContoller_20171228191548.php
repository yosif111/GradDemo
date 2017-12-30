<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Client;

class ApiContoller extends Controller
{
    public function createUser(Request $request){
        $client = new GuzzleHttp\Client(['base_uri' => 'https://foo.com/api/']);
        
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
    public function setIP(Request $request){
        ip::create($request['']);
    }
    public function getIP(){
        return DB::table('ips')->orderBy('created_at', 'desc')->first();
    }
}
