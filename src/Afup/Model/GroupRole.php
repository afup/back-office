<?php

namespace Afup\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupRole
 */
class GroupRole
{
    /**
     * @var string
     */
    private $role;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Afup\Model\Group
     */
    private $group;


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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set group
     *
     * @param \Afup\Model\Group $group
     * @return GroupRole
     */
    public function setGroup(\Afup\Model\Group $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Afup\Model\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
