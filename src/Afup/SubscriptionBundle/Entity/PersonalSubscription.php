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
    
 
}
