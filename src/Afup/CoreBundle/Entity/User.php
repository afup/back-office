<?php

namespace Afup\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Afup\CoreBundle\Entity\Repository\UserRepository")
 * @ORM\Table
 */
class User implements UserInterface
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
     * @ORM\ManyToMany(targetEntity="Afup\CoreBundle\Entity\Group", inversedBy="users")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    protected $groups;

    /************************************************************************
     ** Properties
     ************************************************************************/

    /**
     * @ORM\Column(name="login", type="string")
     */
    protected $username;

    /**
     * @ORM\Column(name="mot_de_passe", type="string", length=32)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $salt;

    /**
     * @ORM\Column(name="civilite", type="string", length=4)
     */
    protected $title;

    /**
     * @ORM\Column(name="nom", type="string")
     */
    protected $lastname;

    /**
     * @ORM\Column(name="prenom", type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(name="email", type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * @ORM\Column(type="text")
     */
    protected $address;

    /**
     * @ORM\Column(type="string")
     */
    protected $zipcode;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * @ORM\Column(type="integer")
     */
    protected $countryId;

    /**
     * @ORM\Column(name="telephone_fixe", type="string", nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(name="telephone_portable", type="string", nullable=true)
     */
    protected $mobilePhone;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $mobile;

    /**
     * @ORM\Column(type="niveau", type="integer")
     */
    protected $level;

    /**
     * @ORM\Column(name="niveau_modules", type="string")
     */
    protected $modulesLevel;

    /**
     * @ORM\Column(name="etat", type="integer")
     */
    protected $status;

    /**
     * @ORM\Column(name="date_relance", type="integer")
     */
    protected $nextReminderDate;

    /**
     * @ORM\Column(name="compte_svn", type="integer")
     */
    protected $svnAccount;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return User
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Add groups
     *
     * @param \Afup\CoreBundle\Entity\Group $groups
     * @return User
     */
    public function addGroup(\Afup\CoreBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Afup\CoreBundle\Entity\Group $groups
     */
    public function removeGroup(\Afup\CoreBundle\Entity\Group $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {inheritDoc}
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * {inheritDoc}
     */
    public function getRoles()
    {
        $roles = [];

        foreach ($this->groups as $group) {
            foreach ($group->getRoles() as $groupRole) {
                $roles[] = $groupRole->getRole();
            }
        }

        return $roles;
    }

    /**
     * {inheritDoc}
     */
    public function eraseCredentials()
    {
        # code...
    }
}