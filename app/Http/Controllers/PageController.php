<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //Gets Home page
    public function home() {
        return view('pages.index');
    }

    //Gets jobs page
    public function jobs() {
        return view('pages.jobs');
    }

    //Gets contact page
    public function contact() {
        return view('pages.contact');
    }
}
