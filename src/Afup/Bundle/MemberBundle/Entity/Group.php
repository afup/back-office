<?php

namespace Afup\Bundle\MemberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`group`")
 */
class Group
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
     * @ORM\ManyToMany(targetEntity="Afup\Bundle\MemberBundle\Entity\User", mappedBy="groups")
     */
    protected $users;

    /**
     * @ORM\OneToMany(targetEntity="Afup\Bundle\MemberBundle\Entity\GroupRole", mappedBy="group", orphanRemoval=true)
     */
    protected $roles;

    /************************************************************************
     ** Properties
     ************************************************************************/

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    public function getRoles()
    {
        return $this->roles;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Group
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add users
     *
     * @param \Afup\Bundle\MemberBundle\Entity\User $users
     * @return Group
     */
    public function addUser(\Afup\Bundle\MemberBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Afup\Bundle\MemberBundle\Entity\User $users
     */
    public function removeUser(\Afup\Bundle\MemberBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add roles
     *
     * @param \Afup\Bundle\MemberBundle\Entity\GroupRole $roles
     * @return Group
     */
    public function addRole(\Afup\Bundle\MemberBundle\Entity\GroupRole $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Afup\Bundle\MemberBundle\Entity\GroupRole $roles
     */
    public function removeRole(\Afup\Bundle\MemberBundle\Entity\GroupRole $roles)
    {
        $this->roles->removeElement($roles);
    }
}