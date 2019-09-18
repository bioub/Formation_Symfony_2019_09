<?php
// Fully Qualified ClassName (FQCN ou FQN)
use Cfd\Log\FileLogger;
use Cfd\Model\Contact;
use Cfd\Model\Societe;

require_once __DIR__ . '/../vendor/autoload.php';
$logger = new FileLogger(__DIR__ . '/../logs/app.log');
$logger->debug('Début la logique application');

$romain = new Contact();
$romain->setPrenom('Romain');
$romain->setNom('Bohdanowicz');

$soc = new Societe();
$soc->setNom('formation.tech');

$romain->setSociete($soc);

// Page (Vue)
$logger->debug('Début du rendu HTML');
echo 'Prénom : ' . $romain->getPrenom() . "\n";
echo 'Société : ' . $romain->getSociete()->getNom() . "\n";

echo 'Contact (toString) : ' . $romain . "\n";