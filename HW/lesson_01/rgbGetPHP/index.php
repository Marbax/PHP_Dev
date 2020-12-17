<?php

#region Global Params
$bgColor = '#fff';
$txtColor = '#000';
$spanText = 'Написать PHP скрипт, создающий на странице три текстовых поля. 
В эти поля пользователь должен заносить значения R, G и B цветовых компонент (в интервале 0-255). 
На странице также должна присутствовать кнопка Accept и тег span с каким-либо текстом внутри.
После нажатия на кнопку Accept, надо создать цвет на основе введенных пользователем значений R, G и B. Этим цветом залить фон тега span, а текст залить дополнительным цветом.';
#endregion

function rgbToHex($r, $g, $b)
{
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}


if (isset($_GET["Red"]) && isset($_GET["Green"]) && isset($_GET["Blue"])) {
    $red = $_GET["Red"];
    $green = $_GET["Green"];
    $blue = $_GET["Blue"];
    $bgColor = rgbToHex($red, $green, $blue);
    $txtColor = rgbToHex(rand(0, 255), rand(0, 255), rand(0, 255));
}


echo '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Document</title>
        </head>
        <body>
            <form method="GET" style="display: block; padding: 2rem">
                <div style="display: block; width: max-content; margin: 0 auto">
                    <input style="margin: 1rem 0.2rem; display: inline-block" name="Red" type="number"  placeholder="Red" required min="0" max="255" />
                    <input style="margin: 1rem 0.2rem; display: inline-block" name="Green" type="number"  placeholder="Green" required min="0" max="255" />
                    <input style="margin: 1rem 0.2rem; display: inline-block" name="Blue" type="number"  placeholder="Blue" required min="0" max="255" />
                    <button style="display: block; margin: 1rem auto" type="submit">Accept</button>
                </div>
            </form>
            <div style="display: block; width: 33vw; margin: 0 auto">
                <span style="background-color: ' . $bgColor . ';color: ' . $txtColor . ';" >' . $spanText . '</span>
            </div>
        </body>
    </html>
';
