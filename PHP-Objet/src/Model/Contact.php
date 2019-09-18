<?php

namespace Cfd\Model;

class Contact
{
    /** @var string */
    protected $prenom;
    /** @var string */
    protected $nom;
    /** @var Societe */
    protected $societe;
    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom(string $prenom): Contact
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom(string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return Societe
     */
    public function getSociete(): Societe
    {
        return $this->societe;
    }

    /**
     * @param Societe $societe
     * @return Contact
     */
    public function setSociete(Societe $societe): Contact
    {
        $this->societe = $societe;
        return $this;
    }

    public function __toString()
    {
        return $this->getPrenom() . ' ' . $this->getNom();
    }

}