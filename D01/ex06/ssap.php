#!/usr/bin/php
<?php

$word = implode(" ", $argv);
$word = preg_replace('/\s+/', ' ', $word);
$word = trim($word);
$word = explode(" ", $word);
$fword = array_shift($word);
sort($word);
foreach ($word as $elem) {
echo $elem."\n";
}

?>