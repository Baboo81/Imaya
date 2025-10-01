<?php

if (! function_exists('ik_url')) {
    function ik_url($path) {

        //Base définie dans le .env
        $base = env('IMAGEKIT_BASE', 'https://ik.imagekit.io/ru3tacudo/imayah');

        // Cas vide
        if (!$path) return rtrim($base, '/') . '/';

        //Si c'est déjà une URL complète (http ou https), pas de changement
        if (preg_match('/^https?:\\/\\//i', $path)) {
            return $path;
        }

        //Sinon on assemble proprement
        return rtrim($base, '/') . '/' .ltrim($path, '/');
    }
}
