<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about() {
        
        return View('pages.about')->with('products', );
    }

    public function jobs() {
        
        return View('pages.jobs')->with('products', );
    }

    public function jobs_details() {
        
        return View('pages.jobs_details')->with('products', );
    }

    public function contact() {
        
        return View('pages.contact')->with('products', );
    }
}
