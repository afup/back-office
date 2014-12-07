<?php

namespace Afup\SubscriptionBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Afup\SubscriptionBundle\Entity\Corporation;
use Afup\SubscriptionBundle\Entity\Member;
use Afup\SubscriptionBundle\Entity\Subscription;
use Afup\SubscriptionBundle\Entity\SubscriptionType;
use Afup\UserBundle\Entity\User;

/**
 * Description of PersonnalSubscriptionManager
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class PersonnalSubscriptionManager
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
    public function createPersonnalMemberSubscription(User $user, SubscriptionType $type, \DateTimeInterface $dateStart = null)
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
        $subscription->setMember($member);
        $subscription->setPrice($type->getPrice());
        $subscription->setStartDate($dateReference);
        $subscription->getEndDate($dateReference->modify('+1an'));
        $this->em->persist($subscription);
        
        return $subscription;
    }
    
    /**
     * Create an Subscription for an User paid by corporation
     * @param User $user
     * @param Corporation $corporation
     * @param \DateTimeInterface $dateStart
     * @return Subscription
     */
    public function createCorporateMemberSubscription(User $user, Corporation $corporation, \DateTimeInterface $dateStart = null)
    {
        $typeCorporationMember = $this->em->getRepository('AfupSubscriptionBundle:SubscriptionType')->findOneByTag('corporation-member');
        
        $subscription = $this->createPersonnalMemberSubscription($user, $typeCorporationMember, $dateStart);
        $subscription->setCorporation($corporation);
        
        return $subscription;
    }
    
    /**
     * Update the current Member subscription
     * @param User $user
     * @param SubscriptionType $type
     * @param \DateTimeInterface $dateStart
     * @return Subscription
     */
    public function updatePersonalMemberSubscription(User $user, SubscriptionType $type, \DateTimeInterface $dateStart = null){
        
        $subscription = $this->em->getRepository('AfupSubscriptionBundle:PersonnalSubscription')->getLastSubscriptionWithUser($user);
        
        $date = new \DateTime();
        $dateReference = ($dateStart instanceof \DateTime) ? $dateStart : new \DateTime();
        
        if($subscription instanceof Subscription){
            $interval = $date->diff($subscription->getEndDate());
            
            if($interval->y === 0){
                $dateReference = $subscription->getEndDate();
            }
        }
        
        return $this->createPersonnalMemberSubscription($user, $type, $dateReference);
    }
    
     /**
     * Update the current Member subscription
     * @param User $user
     * @param Corporation $corporation
     * @param \DateTimeInterface $dateStart
     * @return Subscription
     */
    public function updateCorporateMemberSubscription(User $user, Corporation $corporation, \DateTimeInterface $dateStart = null){
        
        $subscription = $this->em->getRepository('AfupSubscriptionBundle:PersonnalSubscription')->getLastSubscriptionWithUser($user);
        
        $date = new \DateTime();
        $dateReference = ($dateStart instanceof \DateTime) ? $dateStart : new \DateTime();
        
        if($subscription instanceof Subscription){
            $interval = $date->diff($subscription->getEndDate());
            
            if($interval->y === 0){
                $dateReference = $subscription->getEndDate();
            }
        }
        
        return $this->createCorporateMemberSubscription($user, $corporation, $dateReference);
    }

}
