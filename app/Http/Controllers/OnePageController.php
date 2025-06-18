<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnePageController extends Controller
{
    public function index() 
    {

        //Inclure les data
        $data = include resource_path('data/onepageData.php');
        $creations = include resource_path('data/onepageData.php');

        return view('onepage' , [
            'pageTitle' => 'Imayah',
            'metaDesc' => 'Imayah France-Alexandra Vigouroux est un centre de soins énergétiques situé en Sicile et à Bruxelles. France-Alexandra Vigouroux propose des retraites, des ateliers créatifs ainsi que des soins énergétiques, des massages vibratoires, un accompagnement thérapeutique, des méditations, un soin de l\'âme, des bains sonore. Il est possible aussi d\'acheter ses créations réalisées dans un état de transe.',
            'metaKeyWords' => 'Centre de soins énergétiques, retraites, ateliers créatifs, massages vibratoires, accompagnement thérapeutique, méditations, soin de l\'âme, bain sonore.',
            'resetCss' => 'assets/css/reset.css',
            'customCss' => 'assets/css/onePage.css',
            'data' => $data,
            'creations' => $data['creations'],
        ]);
    }
}
