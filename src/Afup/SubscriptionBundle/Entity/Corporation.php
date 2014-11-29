<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corporation
 *
 * @ORM\Entity(repositoryClass="Afup\SubscriptionBundle\Entity\Repository\CorporationRepository")
 */
class Corporation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="siret", type="bigint")
     */
    private $siret;
  
    /**
     * @var \Afup\UserBundle\Entity\User
     * 
     * @ORM\OneToOne(targetEntity="Afup\UserBundle\Entity\User", inversedBy="corporation")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;
    
    /**
     * @var \Afup\SubscriptionBundle\Entity\CorporationSubscription
     * 
     * @ORM\OneToMany(targetEntity="Afup\SubscriptionBundle\Entity\CorporationSubscription", mappedBy="corporation")
     **/
    private $subscriptions;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="numSubscriptionMax", type="int")
     */
    private $numSubscriptionMax;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Corporation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     * @return Corporation
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return integer 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set numSubscriptionMax
     *
     * @param \int $numSubscriptionMax
     * @return Corporation
     */
    public function setNumSubscriptionMax(\int $numSubscriptionMax)
    {
        $this->numSubscriptionMax = $numSubscriptionMax;

        return $this;
    }

    /**
     * Get numSubscriptionMax
     *
     * @return \int 
     */
    public function getNumSubscriptionMax()
    {
        return $this->numSubscriptionMax;
    }

    /**
     * Set user
     *
     * @param \Afup\UserBundle\Entity\User $user
     * @return Corporation
     */
    public function setUser(\Afup\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Afup\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add subscriptions
     *
     * @param \Afup\SubscriptionBundle\Entity\CorporationSubscription $subscriptions
     * @return Corporation
     */
    public function addSubscription(\Afup\SubscriptionBundle\Entity\CorporationSubscription $subscriptions)
    {
        $this->subscriptions[] = $subscriptions;

        return $this;
    }

    /**
     * Remove subscriptions
     *
     * @param \Afup\SubscriptionBundle\Entity\CorporationSubscription $subscriptions
     */
    public function removeSubscription(\Afup\SubscriptionBundle\Entity\CorporationSubscription $subscriptions)
    {
        $this->subscriptions->removeElement($subscriptions);
    }

    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }
}
