<?php

function ft_is_sort($tab)
{
    $i = 0;
    $tmp = $tab;
    sort($tmp);
    while ($tmp[$i])
    {
        if (strcmp($tmp[$i], $tab[$i]))
            return(false);
        else
            $i++;
    }
    return (true);
}

?>