#!/usr/bin/php
<?php

if ($argc != 4)
{
    echo "Incorrect Parameters\n";
    return 0;
}
foreach ($argv as $elem){
    $elem = trim($elem);
}

if (trim($argv[2]) == "+")
    echo ($argv[1] + $argv[3]);
else if (trim($argv[2]) == "-")   
    echo ($argv[1] - $argv[3]);
else if (trim($argv[2]) == "*")   
    echo ($argv[1] * $argv[3]);
else if (trim($argv[2]) == "/")   
    echo ($argv[1] / $argv[3]);
else if (trim($argv[2]) == "%")   
    echo ($argv[1] % $argv[3]);
echo "\n";

?>