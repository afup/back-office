<?php

namespace Afup\SubscriptionBundle\Entity;

/**
 * Description of SubcriptionType
 *
 * @author Jérôme Desjardins <hello@jewome62.eu>
 */
class SubcriptionType
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
