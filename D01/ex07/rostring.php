#!/usr/bin/php
<?php

if ($argc > 1)
{
  $argv[1] = trim($argv[1]);
  $argv[1] = preg_replace('/\s+/', ' ', $argv[1]);
  $word = explode(" ", $argv[1]);
  $flast = array_shift($word);
  $word = implode(" ", $word);
  if (!empty($word))
    echo $word." ";
  echo $flast."\n";
}

?>
