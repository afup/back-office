<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 * 
 * @author Jérôme Desjardins <hello@jewome62.eu>
 *
 * @ORM\Entity(repositoryClass="Afup\SubscriptionBundle\Entity\Repository\MemberRepository")
 */
class Member
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
     * @var \Afup\SubscriptionBundle\Entity\Subscription
     *
     * @ORM\OneToMany(targetEntity="Afup\SubscriptionBundle\Entity\PersonalSubscription", mappedBy="member")
     * @ORM\JoinColumn(name="subscription", referencedColumnName="id")
     */
    private $subscription;
    
    /**
     * @var \Afup\UserBundle\Entity\User
     * 
     * @ORM\OneToOne(targetEntity="Afup\UserBundle\Entity\User", inversedBy="member")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subscription = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add subscription
     *
     * @param \Afup\SubscriptionBundle\Entity\PersonalSubscription $subscription
     * @return Member
     */
    public function addSubscription(\Afup\SubscriptionBundle\Entity\PersonalSubscription $subscription)
    {
        $this->subscription[] = $subscription;

        return $this;
    }

    /**
     * Remove subscription
     *
     * @param \Afup\SubscriptionBundle\Entity\PersonalSubscription $subscription
     */
    public function removeSubscription(\Afup\SubscriptionBundle\Entity\PersonalSubscription $subscription)
    {
        $this->subscription->removeElement($subscription);
    }

    /**
     * Get subscription
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Set user
     *
     * @param \Afup\UserBundle\Entity\User $user
     * @return Member
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
}
