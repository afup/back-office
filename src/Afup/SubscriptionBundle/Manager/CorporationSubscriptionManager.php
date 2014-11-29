<?php

namespace Afup\SubscriptionBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Afup\SubscriptionBundle\Entity\Corporation;
use Afup\SubscriptionBundle\Entity\Member;
use Afup\SubscriptionBundle\Entity\Subscription;
use Afup\SubscriptionBundle\Entity\SubscriptionType;
use Afup\UserBundle\Entity\User;

/**
 * Description of CorporationSubscriptionManager
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class CorporationSubscriptionManager
{
    protected $em;

    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    /**
     * Create an Subscription for an User
     * @param User $user
     * @param SubscriptionType $type
     * @param \DateTimeInterface $dateStart
     * @return Subscription
     */
    public function createCorporateSubscription(User $user, SubscriptionType $type, \DateTimeInterface $dateStart = null)
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
        
        $subscription = new Subscription();
        $subscription->setType($type);
        $subscription->setCorporation($member);
        $subscription->setPrice($type->getPrice());
        $subscription->setStartDate($dateReference);
        $subscription->getEndDate($dateReference->modify('+1an'));
        $this->em->persist($subscription);
        
        return $subscription;
    }
    
    /**
     * Update the current Member subscription
     * @param User $user
     * @param SubscriptionType $type
     * @param \DateTimeInterface $dateStart
     * @return Subscription
     */
    public function updateMemberSubscription(User $user, SubscriptionType $type, \DateTimeInterface $dateStart = null){
        
        $subscription = $this->em->getRepository('AfupSubscriptionBundle:Subscription')->getLastSubscriptionWithUser($user);
        
        $date = new \DateTime();
        $dateStart = ($dateStart instanceof \DateTime) ? $dateStart : new \DateTime();
        
        if($subscription instanceof Subscription){
            $interval = $date->diff($subscription->getEndDate());
            
            if($interval->y === 0){
                $dateStart = $subscription->getEndDate();
            }
        }
        
        return $this->createPersonnalMemberSubscription($user, $type, $dateStart);
    }

}
