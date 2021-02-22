<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use App\Models\Data;

class BitcoinController extends Controller
{


    public function view(){
    	return view('bitcoinview');
    }

    public function callApi(Request $request){
    	$start_date = $request->start_date;
    	$end_date = $request->end_date;
    	 $api_data = Http::get("https://api.coindesk.com/v1/bpi/historical/close.json?start=$start_date&end=$end_date&index=[USD]")->json();
    	
    	return view('bitcoinview', compact('api_data','start_date','end_date'));
	
	
    }
}
