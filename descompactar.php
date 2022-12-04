<?php

$zip = new ZipArchive;
  
// Zip File Name
if ($zip->open("sites/$arquivonome") === TRUE) {
    // Unzip Path
    $zip->extractTo('sites/');
    $zip->close();
    echo 'Unzipped Process Successful!';
} else {
    echo 'Unzipped Process failed';
}

?>