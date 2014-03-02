<?php

namespace Afup\CoreBundle\Entity;

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
     * @ORM\ManyToMany(targetEntity="Afup\CoreBundle\Entity\User", mappedBy="groups")
     */
    protected $users;

    /**
     * @ORM\OneToMany(targetEntity="Afup\CoreBundle\Entity\GroupRole", mappedBy="group", orphanRemoval=true)
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
     * @param \Afup\CoreBundle\Entity\User $users
     * @return Group
     */
    public function addUser(\Afup\CoreBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Afup\CoreBundle\Entity\User $users
     */
    public function removeUser(\Afup\CoreBundle\Entity\User $users)
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
     * @param \Afup\CoreBundle\Entity\GroupRole $roles
     * @return Group
     */
    public function addRole(\Afup\CoreBundle\Entity\GroupRole $roles)
    {
        $this->roles[] = $roles;
    
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Afup\CoreBundle\Entity\GroupRole $roles
     */
    public function removeRole(\Afup\CoreBundle\Entity\GroupRole $roles)
    {
        $this->roles->removeElement($roles);
    }
}