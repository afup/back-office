<?php

namespace Afup\SubscriptionBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Afup\SubscriptionBundle\Entity\Corporation;
use Afup\SubscriptionBundle\Entity\Member;
use Afup\SubscriptionBundle\Entity\Subcription;
use Afup\SubscriptionBundle\Entity\SubcriptionType;
use Afup\UserBundle\Entity\User;

/**
 * Description of SubscriptionManager
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class SubscriptionManager
{
    protected $em;

    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    /**
     * Create an Subscription for an User
     * @param User $user
     * @param SubcriptionType $type
     * @param \DateTimeInterface $dateStart
     * @return Subcription
     */
    public function createMemberSubscription(User $user, SubcriptionType $type, \DateTimeInterface $dateStart = null)
    {
        $member = $user->getMember();
        
        $dateReference = $dateStart !== null ? $dateStart : new \DateTimeImmutable();
        
        if($dateReference instanceof \DateTime){
            $dateReference = \DateTimeImmutable::createFromMutable($dateStart);
        }
        
        if(!($member instanceof Member)){
            $member = new Member();
            $member->setUser($user);
            $this->em->persist($member);
        }
        
        $subscription = new Subcription();
        $subscription->setType($type);
        $subscription->setMember($member);
        $subscription->setPrice($type->getPrice());
        $subscription->setStartDate($dateReference);
        $subscription->getEndDate($dateReference->modify('+1an'));
        $this->em->persist($subscription);
        
        return $subscription;
    }
    
    /**
     * Create an Subcription for an User paid by corporation
     * @param User $user
     * @param Corporation $corporation
     * @param \DateTimeInterface $dateStart
     * @return Subcription
     */
    public function createCorporateSubscription(User $user, Corporation $corporation, \DateTimeInterface $dateStart = null)
    {
        $typeCorporationMember = $this->em->getRepository('AfupSubscriptionBundle:SubcriptionType')->findOneByTag('corporation-member');
        
        $subscription = $this->createMemberSubscription($user, $typeCorporationMember, $dateStart);
        $subscription->setCorporation($corporation);
        
        return $subscription;
    }
}
