<?php

namespace Afup\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 * 
 * @author Jérôme Desjardins <hello@jewome62.eu>
 * 
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Afup\UserBundle\Entity\Repository\UserRepository")
 * 
 * @see FOS\UserBundle
 */
class User extends BaseUser {

    /**
     * @var int
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=40, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=40, nullable=true)
     */
    protected $firstName;

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

}
