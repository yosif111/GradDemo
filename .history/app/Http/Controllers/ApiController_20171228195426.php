<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\ip;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function createUser(Request $request){
        $ip = $this->getIP();
        $client = new GuzzleHttp\Client(['base_uri' => "http://".$ip."/api/"]);
        
        $res = $client->request('POST', 'http://'.$ip.'/api',[
            'body' => [
                'devicetype' => 'Demo'
            ]
        ]);
        $user = $res->getBody()[0]['success']['username'];
        return new Response(['user' => $user],200);
        
        if($res->getStatusCode() == 200) // 200
         User::create($user);
         else
         return new Response("failed",404);

         return new Response(['user' => $user],200);
    }

    public function aux(Request $request){
        $ip = $this->getIP();
        $bulbID = $request['bulbID'];
        $client = new GuzzleHttp\Client(['base_uri' => "http://$ip/api/$user/lights/$bulbID/state"]);
        
        $res = $client->request('PUT','',[
            'body' => [
                '' => $request->except('bulbID'),
            ]
        ]);
    }
    public function setIP(Request $request){

                $ip = new ip;
                $ip->ip = $request->ip;
                $ip->save();

        return new Response(['success'=>true],200);
    }
    public function getIP(){
        return ip::orderBy('created_at', 'desc')->first();
    }
}
