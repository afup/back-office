<?php

namespace Afup\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 */
class Member
{
    /**
     * @var integer
     */
    private $corporation;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var boolean
     */
    private $level;

    /**
     * @var string
     */
    private $modulesLevel;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryId;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var integer
     */
    private $nextReminderDate;

    /**
     * @var string
     */
    private $svnAccount;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set corporation
     *
     * @param integer $corporation
     * @return Member
     */
    public function setCorporation($corporation)
    {
        $this->corporation = $corporation;

        return $this;
    }

    /**
     * Get corporation
     *
     * @return integer 
     */
    public function getCorporation()
    {
        return $this->corporation;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Member
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
     * @return Member
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
     * Set level
     *
     * @param boolean $level
     * @return Member
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return boolean 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set modulesLevel
     *
     * @param string $modulesLevel
     * @return Member
     */
    public function setModulesLevel($modulesLevel)
    {
        $this->modulesLevel = $modulesLevel;

        return $this;
    }

    /**
     * Get modulesLevel
     *
     * @return string 
     */
    public function getModulesLevel()
    {
        return $this->modulesLevel;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Member
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
     * Set lastName
     *
     * @param string $lastName
     * @return Member
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Member
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Member
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
     * Set address
     *
     * @param string $address
     * @return Member
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
     * Set postalCode
     *
     * @param string $postalCode
     * @return Member
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Member
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
     * Set countryId
     *
     * @param string $countryId
     * @return Member
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return string 
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Member
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
     * @return Member
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
     * Set status
     *
     * @param boolean $status
     * @return Member
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set nextReminderDate
     *
     * @param integer $nextReminderDate
     * @return Member
     */
    public function setNextReminderDate($nextReminderDate)
    {
        $this->nextReminderDate = $nextReminderDate;

        return $this;
    }

    /**
     * Get nextReminderDate
     *
     * @return integer 
     */
    public function getNextReminderDate()
    {
        return $this->nextReminderDate;
    }

    /**
     * Set svnAccount
     *
     * @param string $svnAccount
     * @return Member
     */
    public function setSvnAccount($svnAccount)
    {
        $this->svnAccount = $svnAccount;

        return $this;
    }

    /**
     * Get svnAccount
     *
     * @return string 
     */
    public function getSvnAccount()
    {
        return $this->svnAccount;
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
}
