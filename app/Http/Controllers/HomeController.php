<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    /**
     * Home page
     * @return View
     */
    public function index()
    {
        return view('home');
    }
}
