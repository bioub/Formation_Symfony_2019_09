<?php
$nb1 = 1;
$nb2 = $nb1; // passage par valeur
$nb2 = 2;

echo $nb1 . "\n"; // 1

$o1 = new stdClass();
$o1->nb = 1;
$o2 = $o1; // passage par référence
$o2->nb = 2;

echo $o1->nb . "\n"; // 2