<?php

namespace ProjetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\ProjetRepository")
 */
class Projet
{
//
//    /**
//     * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Client", inversedBy="projet")
//     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
//     */
//    private $clients;
//
//    /**
//     * @ManyToMany(targetEntity="CollaborateurBundle\Entity\Collab", mappedBy="projets")
//     */
//    private $collabs;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_projet", type="string", length=40)
     */
    private $nameProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_butoir", type="date")
     */
    private $dateButoir;

    /**
     * @var string
     *
     * @ORM\Column(name="fonctionnalite", type="string", length=255)
     */
    private $fonctionnalite;

    /**
     * @var string
     *
     * @ORM\Column(name="hebergement", type="string", length=255)
     */
    private $hebergement;

    /**
     * @var string
     *
     * @ORM\Column(name="preprod", type="string", length=255)
     */
    private $preprod;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;



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
     * Set nameProjet
     *
     * @param string $nameProjet
     *
     * @return Projet
     */
    public function setNameProjet($nameProjet)
    {
        $this->nameProjet = $nameProjet;

        return $this;
    }

    /**
     * Get nameProjet
     *
     * @return string
     */
    public function getNameProjet()
    {
        return $this->nameProjet;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Projet
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Projet
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set dateButoir
     *
     * @param \DateTime $dateButoir
     *
     * @return Projet
     */
    public function setDateButoir($dateButoir)
    {
        $this->dateButoir = $dateButoir;

        return $this;
    }

    /**
     * Get dateButoir
     *
     * @return \DateTime
     */
    public function getDateButoir()
    {
        return $this->dateButoir;
    }

    /**
     * Set fonctionnalite
     *
     * @param string $fonctionnalite
     *
     * @return Projet
     */
    public function setFonctionnalite($fonctionnalite)
    {
        $this->fonctionnalite = $fonctionnalite;

        return $this;
    }

    /**
     * Get fonctionnalite
     *
     * @return string
     */
    public function getFonctionnalite()
    {
        return $this->fonctionnalite;
    }

    /**
     * Set hebergement
     *
     * @param string $hebergement
     *
     * @return Projet
     */
    public function setHebergement($hebergement)
    {
        $this->hebergement = $hebergement;

        return $this;
    }

    /**
     * Get hebergement
     *
     * @return string
     */
    public function getHebergement()
    {
        return $this->hebergement;
    }

    /**
     * Set preprod
     *
     * @param string $preprod
     *
     * @return Projet
     */
    public function setPreprod($preprod)
    {
        $this->preprod = $preprod;

        return $this;
    }

    /**
     * Get preprod
     *
     * @return string
     */
    public function getPreprod()
    {
        return $this->preprod;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Projet
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

 //   /**
//     * Set client
  //   *
//     * @param \ClientBundle\Entity\Client $client
  //   *
 //    * @return Projet
 //    */
 //   public function setClient(\ClientBundle\Entity\Client $client = null)
 //   {
 //       $this->client = $client;

  //      return $this;
//    }

//    /**
//    //     * Constructor
//    //     */
//    public function __construct()
//    {
//        $this->clients = new ArrayCollection();
//
//        $this->collabs = new ArrayCollection();
//    }
}
