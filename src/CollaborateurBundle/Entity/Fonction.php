<?php

namespace CollaborateurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Fonction
 *
 * @ORM\Table(name="fonction")
 * @ORM\Entity(repositoryClass="CollaborateurBundle\Repository\FonctionRepository")
 */
class Fonction
{
//    /**
//     * @ManyToMany(targetEntity="CollaborateurBundle\Entity\Collab", mappedBy="fonctions")
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
     * @ORM\Column(name="nom_fonction", type="string", length=255)
     */
    private $nomFonction;


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
     * Set nomFonction
     *
     * @param string $nomFonction
     *
     * @return Fonction
     */
    public function setNomFonction($nomFonction)
    {
        $this->nomFonction = $nomFonction;

        return $this;
    }

    /**
     * Get nomFonction
     *
     * @return string
     */
    public function getNomFonction()
    {
        return $this->nomFonction;
    }


    /**
     * Add collab
     *
     * @param \CollaborateurBundle\Entity\Collab $collab
     *
     * @return Fonction
     */
    public function addCollab(\CollaborateurBundle\Entity\Collab $collab)
    {
        $this->collabs[] = $collab;

        return $this;
    }

    /**
     * Remove collab
     *
     * @param \CollaborateurBundle\Entity\Collab $collab
     */
    public function removeCollab(\CollaborateurBundle\Entity\Collab $collab)
    {
        $this->collabs->removeElement($collab);
    }

    /**
     * Get collabs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollabs()
    {
        return $this->collabs;
    }
//    public function __construct()
//    {
//        $this->collabs = new ArrayCollection();
//
//    }
}
