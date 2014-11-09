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
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="corporation", type="object")
     */
    private $corporation;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="member", type="object")
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
     * Set montant
     *
     * @param float $montant
     *
     * @return Subcription
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
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
