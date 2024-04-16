<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Address extends Controller
{
    //====================================================
    // Function : getGetFullAddress()
    //====================================================
    public function getGetFullAddress(Request $roRequest){

        $psAddress = $roRequest->get('hsAddress');


        $data = "";

        // return response()->json($data, 200, $headers);
    }
}
