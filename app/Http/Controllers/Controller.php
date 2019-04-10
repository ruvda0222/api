<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function consulta (Request $req){
    	$results = DB::table('Items')->select()->get();
    	$rows = array();

    	if ($results->isEmpty()){
    		echo "la tabla esta vacia";

    	}else{
    		foreach($results as $row){
    			array_push($rows, $row);
    		}
    		print json_encode($rows);
    	}
    }


}
