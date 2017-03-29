<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * 构造函数
    **/
    public function __construct(){
    	$this->middleware('guest');
    }

    public function index()
    {

        return view('welcome');
    }
}
