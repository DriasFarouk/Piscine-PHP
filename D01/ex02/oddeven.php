#!/usr/bin/php
<?php

while (1)
{
    echo "Entrez un nombre:";
    $string = trim(fgets(STDIN));
    if (feof(STDIN) == TRUE)
		exit();
    if (!is_numeric($string))
     {
        echo "'$string'  n'est pas un chiffre";
        echo "\n";
     }
    else  
    {   
        echo ' Le nombre ' .$string. ' est ';
        if (substr($string, -1) % 2 == 0)
            echo "PAIR\n";
        else
         echo "IMPAIR\n";
     
   }
}

?>