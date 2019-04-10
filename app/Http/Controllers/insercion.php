<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class insercion extends Controller
{
   function insert (Request $req){
    	$desc = $_POST['itemDescription'];
    	$dueDate = $_POST['itemDueDate'];
    	$priority = $_POST['itemPriority'];

    	$data = array('itemDescription'=>$desc,'itemDueDate'=>$dueDate,'itemPriority'=>$priority);
    	if(DB::table('items')->insert($data)){
    		echo "Items guardados correctamente";
    	}else{
    		echo "no se guardaron";
    	}
    }
}
