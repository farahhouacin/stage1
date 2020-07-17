<?php

namespace ProjetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Etat
 *
 * @ORM\Table(name="etat")
 * @ORM\Entity(repositoryClass="ProjetBundle\Repository\EtatRepository")
 */
class Etat
{

//    /**
//     * @ManyToMany(targetEntity="ProjetBundle\Entity\Projet", mappedBy="etats")
//     */
//    private $projets;

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
     * @ORM\Column(name="name_etat", type="string",length=30)
     */
    protected $nameEtat;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameEtat
     *
     * @param string $nameEtat
     *
     * @return Etat
     */
    public function setNameEtat($nameEtat)
    {
        $this->nameEtat = $nameEtat;

        return $this;
    }

    /**
     * Get nameEtat
     *
     * @return string
     */
    public function getNameEtat()
    {
        return $this->nameEtat;
    }

//    /**
//    //     * Constructor
//    //     */
//    public function __construct()
//    {
//        $this->projets = new ArrayCollection();
//    }




}
