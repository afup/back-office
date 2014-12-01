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
     * @var \Afup\SubscriptionBundle\Entity\Member
     * 
     * @ORM\OneToOne(targetEntity="Afup\SubscriptionBundle\Entity\Member", mappedBy="user")
     **/
    protected $member = null;
    
    /**
     * @var \Afup\SubscriptionBundle\Entity\Corporation
     * 
     * @ORM\OneToOne(targetEntity="Afup\SubscriptionBundle\Entity\Corporation", mappedBy="user")
     **/
    protected $corporation = null;
    
    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        // your own logic
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

    /**
     * Set member
     *
     * @param \Afup\SubscriptionBundle\Entity\Member $member
     * @return User
     */
    public function setMember(\Afup\SubscriptionBundle\Entity\Member $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \Afup\SubscriptionBundle\Entity\Member 
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set corporation
     *
     * @param \Afup\SubscriptionBundle\Entity\Corporation $corporation
     * @return User
     */
    public function setCorporation(\Afup\SubscriptionBundle\Entity\Corporation $corporation = null)
    {
        $this->corporation = $corporation;

        return $this;
    }

    /**
     * Get corporation
     *
     * @return \Afup\SubscriptionBundle\Entity\Corporation 
     */
    public function getCorporation()
    {
        return $this->corporation;
    }
}
