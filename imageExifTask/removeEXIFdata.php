<?php

/*
Please write a function to remove the exif information of jpeg file.
*/

$sourceFile = 'demoImg.jpg'; // Input source file
$outputFile = 'output/demoImg.jpg'; // Destination file

removeExifInfo($sourceFile, $outputFile);

function removeExifInfo($inputFile, $outputFile){
    // Input file binary
    $sourceFile = fopen($inputFile, 'rb');
    

    $destFile = fopen($outputFile, 'wb');

    // Finding Exif marker
    while (($s = fread($sourceFile, 2))) {
        $word = @unpack('ni', $s)['i'];
        if ($word == 0xFFE1) {
            // Here reading the length
            $s = fread($sourceFile, 2);
            $len = unpack('ni', $s)['i'];
            // Skipping the exif data
            fread($sourceFile, $len - 2);
            break;
        } else {
            fwrite($destFile, $s, 2);
        }
    }

    // Here writing the remaining data
    while (($s = fread($sourceFile, 4096))) {
        fwrite($destFile, $s, strlen($s));
    }

    fclose($sourceFile);
    fclose($destFile);
}