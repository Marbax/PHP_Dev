<?php

function IsCountryExist($country)
{
    $countryFile = fopen("countries.txt", "rb");
    if ($countryFile == null) {
        return false;
    }

    while (!feof($countryFile)) {
        if (trim(fgets($countryFile)) === $country) {
            fclose($countryFile);
            return true;
        }
    }

    fclose($countryFile);
    return false;
}

function IsCountryInDict($country)
{
    $dictFile = fopen("dictionary.json", "rb");
    if ($dictFile == null) {
        return true;
    }

    while (!feof($dictFile)) {
        if (json_decode(fgets($dictFile))->{'name'} === $country) {
            fclose($dictFile);
            return true;
        }
    }

    fclose($dictFile);
    return false;
}


function AddCountry($country)
{
    $countryFile = fopen("countries.txt", "a");
    fwrite($countryFile, $country);
    fwrite($countryFile, PHP_EOL);
    fclose($countryFile);
}


if (isset($_POST["country"])) {
    $countryInput = $_POST["country"];

    if (!IsCountryExist(($countryInput))) {
        if (IsCountryInDict($countryInput)) {
            AddCountry($countryInput);
        } else {
            header("HTTP/1.1 400 Invalid country.");
        }
    } else {
        header("HTTP/1.1 400 Country already exists.");
    }
} else {
    header("HTTP/1.1 400 Not Enough Params.");
}
