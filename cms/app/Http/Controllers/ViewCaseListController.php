<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCaseListController extends Controller
{
    public function index(){
        return view('view-case-list');
    }

    public function app(){
        return view('case-approve');
    }
}
