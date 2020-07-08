<?php

namespace ClientBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="ClientBundle\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\OneToMany(targetEntity="ProjetBundle\Entity\Projet", mappedBy="client")
     */
    private $projets;
    /**
     * @ManyToMany(targetEntity="CollaborateurBundle\Entity\Role", inversedBy="clients")
     * @JoinTable(name="clients_roles")
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
     * @ORM\Column(name="name_client", type="string", length=40)
     */
    private $nameClient;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname_client", type="string", length=40)
     */
    private $firstnameClient;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_client", type="string", length=14)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="email_client", type="string", length=40)
     */
    private $emailClient;



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
     * Set nameClient
     *
     * @param string $nameClient
     *
     * @return Client
     */
    public function setNameClient($nameClient)
    {
        $this->nameClient = $nameClient;

        return $this;
    }

    /**
     * Get nameClient
     *
     * @return string
     */
    public function getNameClient()
    {
        return $this->nameClient;
    }

    /**
     * Set firstnameClient
     *
     * @param string $firstnameClient
     *
     * @return Client
     */
    public function setFirstnameClient($firstnameClient)
    {
        $this->firstnameClient = $firstnameClient;

        return $this;
    }

    /**
     * Get firstnameClient
     *
     * @return string
     */
    public function getFirstnameClient()
    {
        return $this->firstnameClient;
    }

    /**
     * Set telClient
     *
     * @param string $telClient
     *
     * @return Client
     */
    public function setTelClient($telClient)
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * Get telClient
     *
     * @return string
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * Set emailClient
     *
     * @param string $emailClient
     *
     * @return Client
     */
    public function setEmailClient($emailClient)
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    /**
     * Get emailClient
     *
     * @return string
     */
    public function getEmailClient()
    {
        return $this->emailClient;
    }

    /**
     * Add projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return Client
     */
    public function addProjet(\ProjetBundle\Entity\Projet $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     */
    public function removeProjet(\ProjetBundle\Entity\Projet $projet)
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
     * @param \ProjetBundle\Entity\Role $role
     *
     * @return Client
     */
    public function addRole(\ProjetBundle\Entity\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \ProjetBundle\Entity\Role $role
     */
    public function removeRole(\ProjetBundle\Entity\Role $role)
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

    public function __construct()
    {
        $this->projets = new ArrayCollection();

        $this->roles = new ArrayCollection();
    }
}
