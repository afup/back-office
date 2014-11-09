<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
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
}
