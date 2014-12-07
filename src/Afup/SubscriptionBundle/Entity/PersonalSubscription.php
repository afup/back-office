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
     * @var \Afup\SubscriptionBundle\Entity\CorporateSubscription
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\CorporateSubscription", inversedBy="employee")
     * @ORM\JoinColumn(name="corporate_subscription_id", referencedColumnName="id")
     */
    private $corporateSubscription;
    
 

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
     * Set corporateSubscription
     *
     * @param \Afup\SubscriptionBundle\Entity\CorporateSubscription $corporateSubscription
     * @return PersonalSubscription
     */
    public function setCorporateSubscription(\Afup\SubscriptionBundle\Entity\CorporateSubscription $corporateSubscription = null)
    {
        $this->corporateSubscription = $corporateSubscription;

        return $this;
    }

    /**
     * Get corporateSubscription
     *
     * @return \Afup\SubscriptionBundle\Entity\CorporateSubscription 
     */
    public function getCorporateSubscription()
    {
        return $this->corporateSubscription;
    }
}
