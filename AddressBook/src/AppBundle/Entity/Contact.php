<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository") */
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
     * @Assert\NotBlank()
     * @Assert\Length(max="40", maxMessage="Le prénom ne doit pas dépasse 40 caractères")
     */
    protected $prenom;

    /**
     * @var string
     * @ORM\Column(name="last_name", length=40)
     * @Assert\NotBlank(message="Le nom est obligatoire")
     * @Assert\Length(max="40")
     */
    protected $nom;

    /**
     * @var string
     * @ORM\Column(length=80, nullable=true)
     * @Assert\Length(max="80")
     */
    protected $city;

    /**
     * @var Societe
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Societe", inversedBy="contacts")
     */
    protected $societe;

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

    /**
     * Set societe
     *
     * @param \AppBundle\Entity\Societe $societe
     *
     * @return Contact
     */
    public function setSociete(\AppBundle\Entity\Societe $societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \AppBundle\Entity\Societe
     */
    public function getSociete()
    {
        return $this->societe;
    }
}
