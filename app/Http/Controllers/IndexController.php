<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index(){
        $brands = DB::table('brands')->get();
        return view('landing',compact('brands'));
    }
}
