<?php
// Fully Qualified ClassName (FQCN ou FQN)
use Cfd\Model\Contact;
use Cfd\Model\Societe;

require_once __DIR__ . '/../vendor/autoload.php';
$container = require_once __DIR__ . '/../services/services_dev.php';

$logger = $container->get('logger');
$logger->debug('Début la logique application');

$romain = new Contact();
//$debut = microtime(true);
//for ($i=0; $i<100000; $i++) {
//    $romain->setPrenom('Romain');
//}
//$fin = microtime(true);
//echo 'Temps : ' . ($fin - $debut);
$romain->setPrenom('Romain');
$romain->setNom('Bohdanowicz');

$soc = new Societe();
$soc->setNom('formation.tech');

// $romain->setSociete($soc);

// Page (Vue)
$logger->debug('Début du rendu HTML');
echo 'Prénom : ' . $romain->getPrenom() . "\n";
if ($romain->getSociete()) {
    echo 'Société : ' . $romain->getSociete()->getNom() . "\n";
}

echo 'Contact (toString) : ' . $romain . "\n";