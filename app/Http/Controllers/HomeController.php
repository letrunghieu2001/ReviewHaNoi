<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function info ()
    {
        return view('home.info');
    }
    public function contact ()
    {
        return view('home.contact');
    }
    public function privacy ()
    {
        return view('home.privacy');
    }
    public function support ()
    {
        return view('home.support');
    }
    public function map ()
    {
        return view('home.map');
    }

}
