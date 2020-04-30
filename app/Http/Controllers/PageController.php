<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(){
        $headers = 'Index Page';
        return view('index', ['headers' => $headers]);
    }

    public function features(){
        $headers = 'Features Page';
        return view('features', ['headers' => $headers]);
    }

    public function pricing(){
        $headers = 'Pricing Page';
        return view('pricing', ['headers' => $headers]);
    }
}