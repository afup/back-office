<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of CorporateSubscription
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 * 
 * @ORM\Entity(repositoryClass="Afup\SubscriptionBundle\Entity\Repository\CorporateSubscriptionRepository")
 */
class CorporateSubscription extends Subscription
{
    /**
     * @var \Afup\SubscriptionBundle\Entity\CorporationSubscription
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\CorporationSubscription", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id")
     */
    private $corporation;

    /**
     * Set corporation
     *
     * @param \Afup\SubscriptionBundle\Entity\CorporationSubscription $corporation
     * @return CorporateSubscription
     */
    public function setCorporation(\Afup\SubscriptionBundle\Entity\CorporationSubscription $corporation = null)
    {
        $this->corporation = $corporation;

        return $this;
    }

    /**
     * Get corporation
     *
     * @return \Afup\SubscriptionBundle\Entity\CorporationSubscription 
     */
    public function getCorporation()
    {
        return $this->corporation;
    }
}
