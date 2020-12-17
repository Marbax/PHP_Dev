<?php

$someVar = 10;
$a = $someVar;
$a += 10;
$b = &$a;
$c;
$n = "10";
echo "Hello a =  \"$a\"  some =  \"$someVar\" b =  \"$b\"";
echo "</br>Hello a = " . $a * 2 . " some = " . $someVar . " b = " . $b;
echo "</br>c isset  = " . isset($c);
unset($someVar);

//error  echo "some var = " . $someVar;



define("VALUE", 27);
echo "</br>";
echo VALUE;


echo "</br>";
echo __FILE__;
echo "</br>";
echo defined(VALUE);
echo "</br>";
echo  $n . " = " . gettype($n) . " is num = " . is_numeric($n);
echo "</br>";
echo "is num" . is_numeric($a);
echo "</br>";
echo "is int" . is_numeric($a);
echo "</br>";


$q = 2.344;
settype($q, "integer");
echo $q;



echo "</br>";
