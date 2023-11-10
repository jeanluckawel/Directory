<?php

$repertoire_source= getcwd();
if ($repertoire_source == '/home/ui'){
    echo "### 404 ###";
    exit();
}
$files = scandir($repertoire_source);
foreach ($files as $file) {
    if ($file == "." || $file == "..") {
        continue;
    }
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $directory_extension =  $repertoire_source . "/" . $extension;
    if (!is_dir($directory_extension)) {
        mkdir($directory_extension);
    }
    $directory_source = $repertoire_source . "/" . $file;
    rename($directory_source, $directory_extension . "/" . $file);
}
echo "### 200 ###";
