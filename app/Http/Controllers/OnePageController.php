<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class OnePageController extends Controller
{
    public function index()
    {

        //Inclure les data
        $data = include resource_path('data/onepageData.php');

        // --- DEBUG / chargement data ---
        $path = resource_path('data/onepageData.php');
        if (file_exists($path)) {
            $data = include $path;
            Log::info('onepageData chargé, clés : ' . implode(', ', array_keys($data)));
        } else {
            Log::error('Fichier onepageData.php introuvable à : ' . $path);
            $data = [];
        }
        // --- FIN DEBUG ---


        return view('onepage' , [
            'pageTitle' => "Imayah (France-Alexandra Vigouroux)",
            'metaDesc' => "Découvrez Imayah le site de France-Alexandra Vigouroux est un centre de soins énergétiques situé en Sicile et à Bruxelles. France-Alexandra Vigouroux propose des retraites, des ateliers créatifs ainsi que des soins énergétiques, des massages vibratoires, un accompagnement thérapeutique, des méditations, un soin de l'âme, des bains sonore. Il est possible aussi d'acheter ses créations réalisées dans un état de transe.",
            'metaKeyWords' => "France-Alexandra Vigouroux, Centre de soins énergétiques, retraites, ateliers créatifs, massages vibratoires, accompagnement thérapeutique, méditations, soin de l'âme, bain sonore.",
            'resetCss' => "assets/css/reset.css",
            'customCss' => "assets/css/onePage.css",
            'data' => $data,
            'creations' => $data['creations'] ?? [],
        ]);
    }
}
