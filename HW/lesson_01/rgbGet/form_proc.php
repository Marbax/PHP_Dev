<?php

function rgbToHex($r, $g, $b)
{
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}


if (isset($_GET["Red"]) && isset($_GET["Green"]) && isset($_GET["Blue"])) {
    $red = $_GET["Red"];
    $green = $_GET["Green"];
    $blue = $_GET["Blue"];
    echo json_encode(rgbToHex($red, $green, $blue));
} else {
    echo json_encode("Not enough params.");
}
