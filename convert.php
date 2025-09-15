<?php
$inputFile = "resources/data/onepageData.php";   // ton fichier source
$outputFile = "onepageData_clean.php"; // fichier nettoyé

$content = file_get_contents($inputFile);

// 🔹 Étape 1 : remplacer les simples quotes autour des valeurs par des doubles quotes
// Ça détecte => 'clé' => 'valeur'
$content = preg_replace_callback(
    "/'([^']+)'\s*=>\s*'([^']*)'/u",
    function ($matches) {
        $key = $matches[1];
        $value = $matches[2];
        // Supprimer les backslashes inutiles
        $value = str_replace("\\'", "'", $value);
        return "'$key' => \"$value\"";
    },
    $content
);

// 🔹 Étape 2 : supprimer les échappements restants
$content = str_replace("\\'", "'", $content);

// Sauvegarder dans un nouveau fichier
file_put_contents($outputFile, $content);

echo "✅ Fichier nettoyé généré : $outputFile\n";
