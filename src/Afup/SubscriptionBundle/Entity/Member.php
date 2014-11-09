<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 * 
 * @author Jérôme Desjardins <hello@jewome62.eu>
 *
 * @ORM\Table()
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
     * @var \stdClass
     *
     * @ORM\Column(name="subscription", type="object")
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subscription
     *
     * @param \stdClass $subscription
     *
     * @return Member
     */
    public function setSubscription($subscription)
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Get subscription
     *
     * @return \stdClass
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
