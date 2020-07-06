<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="ClientBundle\Repository\ClientRepository")
 */
class Client
{
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
     * @ORM\Column(name="name_client", type="string", length=20)
     */
    private $nameClient;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname_client", type="string", length=20)
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
     * @ORM\Column(name="email_client", type="string", length=30)
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
}
