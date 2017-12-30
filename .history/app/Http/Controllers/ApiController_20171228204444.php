<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\ip;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function createUser(){
        $ip = $this->getIP();
        $client = new \GuzzleHttp\Client(['base_uri' => "http://$ip/api/"]);
        
        $res = $client->request('POST','',[
            'form_params' => [
                'devicetype' => 'Demo'
            ]
        ]);
        $user = $res->getBody();
        return $user;
        
        if($res->getStatusCode() == 200) // 200
         User::create($user);
         else
         return new Response("failed",404);

         return $user;
    }

    public function aux(Request $request){
        $ip = $this->getIP();
        $bulbID = $request['bulbID'];
        $user = $this->getUser();
        if(!$user){
            $client = new \GuzzleHttp\Client(['base_uri' => "http://$ip/api/"]);
            
            $res = $client->request('POST','',[
                'json' => [
                    "devicetype" => "Demo"
                ]
            ]);
            //$user = $res->getBody();
            $user =  $res->getBody();

            return $user;
        }
        $client = new \GuzzleHttp\Client(['base_uri' => "http://.'$ip.'/api/'.$user.'/lights/'.$bulbID.'/state"]);
        return 'http://$ip/api/$user/lights/$bulbID/state';
        $res = $client->request('PUT','',[
            'json' => [
                $request->except('bulbID')
            ]
        ]);

        return new Response(['res' => $res->getBody()], 200);
    }
    public function setIP(Request $request){

                $ip = new ip;
                $ip->ip = $request->ip;
                $ip->save();

        return new Response(['success'=>true],200);
    }
    public function getIP(){
        return ip::orderBy('created_at', 'desc')->pluck('ip')->first();
    }
    public function getUser(){
        return User::orderBy('created_at', 'desc')->pluck("name")->first();
    }
}
