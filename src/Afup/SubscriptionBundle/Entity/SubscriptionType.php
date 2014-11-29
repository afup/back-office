<?php

namespace Afup\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of SubscriptionType
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class SubscriptionType
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $tag;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;
    
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", scale=2)
     */
    private $price;
}
