<?php

// Utiliser scandir
// Ce que l'on doit trouver = 'crystal-skull.txt'

function foundCrystal($path)
{
    $contents = scandir($path);

    foreach ($contents as $item) {

        // Skip current and parent directory entries
        if ($item == '.' || $item == '..') {
            continue;
        }
        $newPath = $path . '/' . $item;

        // Find the treasure
        if (is_dir($newPath)) {
            $result = foundCrystal($newPath);

            if ($result !== null) {
                return $result;
            }
        } elseif ($item == 'crystal-skull.txt') {
            return $newPath;
        }
    }
    var_dump(is_dir($newPath));
    return null;
}


// Start the game
$path = 'temple';
$result = foundCrystal($path);

if ($result !== null) {
    echo "Congratulation! You found it! at direction: $result\n";
} else {
    echo "It's not here, keep finding b*tch!";
}