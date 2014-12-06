<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of PersonalSubscription
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 * 
 * @ORM\Entity(repositoryClass="Afup\SubscriptionBundle\Entity\Repository\PersonalSubscriptionRepository")
 */
class PersonalSubscription extends Subscription
{
    /**
     * @var \Afup\SubscriptionBundle\Entity\Member
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\Member", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     */
    private $member;
    
    /**
     * @var \Afup\SubscriptionBundle\Entity\CorporationSubscription
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\CorporationSubscription", inversedBy="employee")
     * @ORM\JoinColumn(name="corporation_subscription_id", referencedColumnName="id")
     */
    private $corporationSubscription;
    
 

    /**
     * Set member
     *
     * @param \Afup\SubscriptionBundle\Entity\Member $member
     * @return PersonalSubscription
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
     * Set corporationSubscription
     *
     * @param \Afup\SubscriptionBundle\Entity\CorporationSubscription $corporationSubscription
     * @return PersonalSubscription
     */
    public function setCorporationSubscription(\Afup\SubscriptionBundle\Entity\CorporationSubscription $corporationSubscription = null)
    {
        $this->corporationSubscription = $corporationSubscription;

        return $this;
    }

    /**
     * Get corporationSubscription
     *
     * @return \Afup\SubscriptionBundle\Entity\CorporationSubscription 
     */
    public function getCorporationSubscription()
    {
        return $this->corporationSubscription;
    }
}
