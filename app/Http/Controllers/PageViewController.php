<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PageViewController extends Controller
{
    public function anasayfa(){
        return view('themes/home/index');
    }
}
