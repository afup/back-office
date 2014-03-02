<?php

namespace Afup\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class GroupRole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /************************************************************************
     ** Relations
     ************************************************************************/

    /**
     * @ORM\ManyToOne(targetEntity="Afup\CoreBundle\Entity\Group", inversedBy="roles")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
     */
    protected $group;

    /************************************************************************
     ** Properties
     ************************************************************************/

    /**
     * @ORM\Column(type="string")
     */
    protected $role;

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
     * Set role
     *
     * @param string $role
     * @return GroupRole
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set group
     *
     * @param \Afup\CoreBundle\Entity\Group $group
     * @return GroupRole
     */
    public function setGroup(\Afup\CoreBundle\Entity\Group $group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Afup\CoreBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}