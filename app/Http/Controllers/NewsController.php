<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){



    }
}