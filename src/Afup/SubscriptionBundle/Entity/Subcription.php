<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcription
 * 
 * @author Jérôme Desjardins <hello@jewome62.eu>
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Afup\SubscriptionBundle\Entity\Repository\SubcriptionRepository")
 */
class Subcription
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
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date")
     */
    private $endDate;

    /**
     * @var \Afup\SubscriptionBundle\Entity\Corporation
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\SubcriptionType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;
    
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", scale=2)
     */
    private $price;

    /**
     * @var \Afup\SubscriptionBundle\Entity\Corporation
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\Corporation", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="corporation_id", referencedColumnName="id")
     */
    private $corporation;

    /**
     * @var \Afup\SubscriptionBundle\Entity\Member
     *
     * @ORM\ManyToOne(targetEntity="Afup\SubscriptionBundle\Entity\Member", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     */
    private $member;


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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Subcription
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Subcription
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Subcription
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set corporation
     *
     * @param \stdClass $corporation
     *
     * @return Subcription
     */
    public function setCorporation($corporation)
    {
        $this->corporation = $corporation;

        return $this;
    }

    /**
     * Get corporation
     *
     * @return \stdClass
     */
    public function getCorporation()
    {
        return $this->corporation;
    }

    /**
     * Set member
     *
     * @param \stdClass $member
     *
     * @return Subcription
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \stdClass
     */
    public function getMember()
    {
        return $this->member;
    }
}
