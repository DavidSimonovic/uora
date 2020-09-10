<?php

namespace App\Http\Controllers;
use App\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{

    public function index(){

        $reports = Report::all();

        return view('admin.reports',compact('reports'));
    }
}
