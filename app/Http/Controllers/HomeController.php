<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => "Homepage"
        );
        // return view('index', $data);
        return view('home', $data);
    }
}
