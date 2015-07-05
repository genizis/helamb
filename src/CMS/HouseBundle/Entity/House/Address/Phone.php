<?php

namespace CMS\HouseBundle\Entity\House\Address;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 *
 * @ORM\Table(name="house_phone")
 * @ORM\Entity
 */
class Phone
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
     * @var integer
     *
     * @ORM\Column(name="ddi", type="integer")
     */
    private $ddi;

    /**
     * @var integer
     *
     * @ORM\Column(name="ddd", type="integer")
     */
    private $ddd;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_main_phone", type="boolean")
     */
    private $isMainPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="branch_line", type="integer")
     */
    private $branchLine;


    /**
     * @var \CMS\HouseBundle\Entity\House\Address
     *
     * @ORM\ManyToOne(targetEntity="CMS\HouseBundle\Entity\House\Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * })
     */
    private $address;


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
     * Set ddi
     *
     * @param integer $ddi
     * @return Phone
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;

        return $this;
    }

    /**
     * Get ddi
     *
     * @return integer 
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * Set ddd
     *
     * @param integer $ddd
     * @return Phone
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;

        return $this;
    }

    /**
     * Get ddd
     *
     * @return integer 
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Phone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set isMainPhone
     *
     * @param boolean $isMainPhone
     * @return Phone
     */
    public function setIsMainPhone($isMainPhone)
    {
        $this->isMainPhone = $isMainPhone;

        return $this;
    }

    /**
     * Get isMainPhone
     *
     * @return boolean 
     */
    public function getIsMainPhone()
    {
        return $this->isMainPhone;
    }

    /**
     * Set branchLine
     *
     * @param integer $branchLine
     * @return Phone
     */
    public function setBranchLine($branchLine)
    {
        $this->branchLine = $branchLine;

        return $this;
    }

    /**
     * Get branchLine
     *
     * @return integer 
     */
    public function getBranchLine()
    {
        return $this->branchLine;
    }

    /**
     * @return \CMS\HouseBundle\Entity\House\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \CMS\HouseBundle\Entity\House\Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

}
