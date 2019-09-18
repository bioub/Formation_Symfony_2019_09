<?php


namespace Cfd\Model;


class Societe
{
    protected $nom;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Societe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

}