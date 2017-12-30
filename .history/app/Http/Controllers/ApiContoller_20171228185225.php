<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiContoller extends Controller
{
    public function createUser(Request $request){

        $client = new Client();
        $res = $client->request('POST', 'https://url_to_the_api', [
            'body' => [
                'client_id' => 'test_id',
                'secret' => 'test_secret',
            ]
        ]);

        // echo $res->getStatusCode(); // 200
        // echo $res->getBody();
    }
}
