<?php

namespace CMS\HouseBundle\Entity\House;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="house_address")
 * @ORM\Entity
 */
class Address
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
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=255)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=15)
     */
    private $postcode;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="city", type="object")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255)
     */
    private $complement;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_main_address", type="boolean")
     */
    private $isMainAddress;

    /**
     * @var \CMS\HouseBundle\Entity\House
     *
     * @ORM\ManyToOne(targetEntity="CMS\HouseBundle\Entity\House")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="house_id", referencedColumnName="id")
     * })
     */
    private $house;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CMS\HouseBundle\Entity\House\Address\Phone", mappedBy="house")
     */
    private $phones;


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
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set district
     *
     * @param string $district
     * @return Address
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Address
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set city
     *
     * @param \stdClass $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \stdClass 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set complement
     *
     * @param string $complement
     * @return Address
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Address
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
     * Set isMainAddress
     *
     * @param boolean $isMainAddress
     * @return Address
     */
    public function setIsMainAddress($isMainAddress)
    {
        $this->isMainAddress = $isMainAddress;

        return $this;
    }

    /**
     * Get isMainAddress
     *
     * @return boolean 
     */
    public function getIsMainAddress()
    {
        return $this->isMainAddress;
    }

    /**
     * Set house
     *
     * @param \stdClass $house
     * @return Address
     */
    public function setHouse($house)
    {
        $this->house = $house;

        return $this;
    }

    /**
     * Get house
     *
     * @return \stdClass 
     */
    public function getHouse()
    {
        return $this->house;
    }
}
