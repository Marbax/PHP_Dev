<?php

$name = $_POST["login"];
$email = $_POST["email"];
$pass = $_POST["password"];
$passConf = $_POST["passwordConfirm"];

if (strlen($name) > 3 && $pass === $passConf && filter_var($email, FILTER_VALIDATE_EMAIL) != null) {
    echo "login successfull";
} else {
    echo "login data incorrect";
}
