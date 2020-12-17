<?php

function GetCountriesList()
{
    $countries = array();
    $countryFile = fopen("countries.txt", "rb") or die(header("HTTP/1.1 400 File Doesn't exist"));
    while (!feof($countryFile)) {
        $countries[] = trim(fgets($countryFile));
    }
    fclose($countryFile);

    #$content = fread($countryFile, filesize($countryFile));
    #$countries = explode(PHP_EOL, $content);
    return $countries;
}

echo json_encode(GetCountriesList());
