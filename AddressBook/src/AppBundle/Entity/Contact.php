<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity() */
class Contact
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue("AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="first_name", length=40)
     */
    protected $prenom;

    /**
     * @var string
     * @ORM\Column(name="last_name", length=40)
     */
    protected $nom;

    /**
     * @var string
     * @ORM\Column(length=80, nullable=true)
     */
    protected $city;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Contact
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Contact
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}
