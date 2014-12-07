<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Afup\SubscriptionBundle\Entity\Corporation;
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
     * @var \Afup\SubscriptionBundle\Entity\Corporation
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\Corporation", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id")
     */
    private $corporation;

    /**
     * Set corporation
     *
     * @param \Afup\SubscriptionBundle\Entity\Corporation $corporation
     * @return CorporateSubscription
     */
    public function setCorporation(Corporation $corporation = null)
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
