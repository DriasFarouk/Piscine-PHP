#!/usr/bin/php
<?php

if ($argc > 2)
{
    foreach ($argv as $elem) {
        $index = strpos($elem, ":");
        $tmp = substr($elem, 0, $index);
        if (!strcmp($tmp, $argv[1]))
           $ret = substr($elem, $index + 1);
    }
    if (!empty($ret))
        echo $ret."\n";
}

?>