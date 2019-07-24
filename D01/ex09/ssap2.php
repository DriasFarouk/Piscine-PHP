#!/usr/bin/php
<?php

if ($argc != 1)
{
    $word = implode(" ", $argv);
    $word = preg_replace('/\s+/', ' ', $word);
    $word = trim($word);
    $word = explode (" ", $word);
    $flast = array_shift($word);

    foreach ($word as $elem) 
    {
        if (($elem[0] >= 'a' && $elem[0] <= 'z') || ($elem[0] >='A' && $elem[0] <='Z'))
           $lettre[] = $elem;
        else if ($elem[0] >= '0' && $elem[0] <='9')
           $num[] = $elem;
        else
            $ascii[] = $elem; 
    }

 
    if(!empty($lettre))
    {
        usort($lettre, "strcasecmp");
        foreach ($lettre as $elem){
            echo $elem."\n";
        }
    }
    if(!empty($num))
    {
        sort($num, SORT_STRING);
        foreach ($num as $elem){
            echo $elem."\n";
        }
    }
    if(!empty($ascii))
    {
        sort($ascii);
        foreach ($ascii as $elem){
            echo $elem."\n";
        }
    }
    
}

?>