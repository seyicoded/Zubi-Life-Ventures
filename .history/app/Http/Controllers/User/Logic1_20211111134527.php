<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Logic1 extends Controller
{
    public function view_categories($route_name){
        // echo $route_name;
        // get category information
        $cat_ = DB::select('SELECT * from category where route_name = ?', [$route_name]);
        if(count($cat_) == 0){
            return response('', 404);
        }
    }
}
