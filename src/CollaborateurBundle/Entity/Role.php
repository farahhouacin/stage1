<?php

namespace CollaborateurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="CollaborateurBundle\Repository\RoleRepository")
 */
class Role
{
    /**
     * @ManyToMany(targetEntity="ClientBundle\Entity\Client", mappedBy="roles")
     */
    private $clients;

    /**
     * @ManyToMany(targetEntity="CollaborateurBundle\Entity\Collab", mappedBy="roles")
     */
    private $collabs;


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
     * @ORM\Column(name="nom_role", type="string", length=255)
     */
    private $nomRole;


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
     * Set nomRole
     *
     * @param string $nomRole
     *
     * @return Role
     */
    public function setNomRole($nomRole)
    {
        $this->nomRole = $nomRole;

        return $this;
    }

    /**
     * Get nomRole
     *
     * @return string
     */
    public function getNomRole()
    {
        return $this->nomRole;
    }


    public function __construct()
    {
        $this->clients = new ArrayCollection();

        $this->collabs = new ArrayCollection();
    }


    /**
     * Add client
     *
     * @param \ClientBundle\Entity\Client $client
     *
     * @return Role
     */
    public function addClient(\ClientBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \ClientBundle\Entity\Client $client
     */
    public function removeClient(\ClientBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add collab
     *
     * @param \CollaborateurBundle\Entity\Collab $collab
     *
     * @return Role
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
}
