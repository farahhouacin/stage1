<?php

namespace CollaborateurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Collab
 *
 * @ORM\Table(name="collab")
 * @ORM\Entity(repositoryClass="CollaborateurBundle\Repository\CollabRepository")
 */
class Collab
{

    /**
     * @ManyToMany(targetEntity="ProjetBundle\Entity\Projet", inversedBy="collab")
     * @JoinTable(name="projets_collabs")
     */
    private $projets;
    /**
     * @ManyToMany(targetEntity="CollaborateurBundle\Entity\Fonction", inversedBy="collab")
     * @JoinTable(name="collabs_fonctions")
     */
    private $roles;


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
     * @ORM\Column(name="password_collab", type="string", length=255)
     */
    private $passwordCollab;


    /**
     * @var string
     *
     * @ORM\Column(name="name_collab", type="string", length=40)
     */
    private $nameCollab;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname_collab", type="string", length=40)
     */
    private $firstnameCollab;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_collab", type="string", length=14)
     */
    private $telCollab;

    /**
     * @var string
     *
     * @ORM\Column(name="email_collab", type="string", length=40)
     */
    private $emailCollab;



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
     * Set passwordCollab
     *
     * @param string $passwordCollab
     *
     * @return Collab
     */
    public function setPasswordCollab($passwordCollab)
    {
        $this->passwordCollab = $passwordCollab;

        return $this;
    }

    /**
     * Get passwordCollab
     *
     * @return string
     */
    public function getPasswordCollab()
    {
        return $this->passwordCollab;
    }

    /**
     * Set emailCollab
     *
     * @param string $emailCollab
     *
     * @return Collab
     */
    public function setEmailCollab($emailCollab)
    {
        $this->emailCollab = $emailCollab;

        return $this;
    }

    /**
     * Get emailCollab
     *
     * @return string
     */
    public function getEmailCollab()
    {
        return $this->emailCollab;
    }

    /**
     * Set nameCollab
     *
     * @param string $nameCollab
     *
     * @return Collab
     */
    public function setNameCollab($nameCollab)
    {
        $this->nameCollab = $nameCollab;

        return $this;
    }

    /**
     * Get nameCollab
     *
     * @return string
     */
    public function getNameCollab()
    {
        return $this->nameCollab;
    }

    /**
     * Set firstnameCollab
     *
     * @param string $firstnameCollab
     *
     * @return Collab
     */
    public function setFirstnameCollab($firstnameCollab)
    {
        $this->firstnameCollab = $firstnameCollab;

        return $this;
    }

    /**
     * Get firstnameCollab
     *
     * @return string
     */
    public function getFirstnameCollab()
    {
        return $this->firstnameCollab;
    }
    /**
     * Set telCollab
     *
     * @param string $telCollab
     *
     * @return Collab
     */
    public function setTelCollab($telCollab)
    {
        $this->telCollab = $telCollab;

        return $this;
    }

    /**
     * Get telCollab
     *
     * @return string
     */
    public function getTelCollab()
    {
        return $this->telCollab;
    }

    public function __construct()
    {
        $this->fonctions = new ArrayCollection();

    }

    /**
     * Add projet
     *
     * @param \CollaborateurBundle\Entity\Fonction $projet
     *
     * @return Collab
     */
    public function addProjet(\CollaborateurBundle\Entity\Fonction $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \CollaborateurBundle\Entity\Fonction $projet
     */
    public function removeProjet(\CollaborateurBundle\Entity\Fonction $projet)
    {
        $this->projets->removeElement($projet);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjets()
    {
        return $this->projets;
    }

    /**
     * Add role
     *
     * @param \CollaborateurBundle\Entity\Fonction $role
     *
     * @return Collab
     */
    public function addRole(\CollaborateurBundle\Entity\Fonction $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \CollaborateurBundle\Entity\Fonction $role
     */
    public function removeRole(\CollaborateurBundle\Entity\Fonction $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
