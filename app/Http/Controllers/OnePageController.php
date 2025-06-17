<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnePageController extends Controller
{
    public function index() 
    {
        return view('onepage' , [
            'pageTitle' => 'Imayah',
            'resetCss' => 'css/reset.css',
            'customCss' => 'css/onePage.css',
        ]);
    }
}
