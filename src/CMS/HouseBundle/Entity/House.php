<?php

namespace CMS\HouseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use CMS\BaseBundle\Services\Tools;

/**
 * House
 *
 * @ORM\Table(name="house")
 * @ORM\Entity(repositoryClass="CMS\HouseBundle\Entity\HouseRepository")
 */
class House
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var ArrayCollection $musicGenres
     *
     * @ORM\ManyToMany(targetEntity="CMS\GeneralEntriesBundle\Entity\MusicGenre", cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *      name="house_music_genres",
     *      joinColumns={@ORM\JoinColumn(name="house_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="music_genre_id", referencedColumnName="id")}
     * )
     */
    private $musicGenres;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="text")
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="physical_space", type="text")
     */
    private $physicalSpace;

    /**
     * @var float
     *
     * @ORM\Column(name="parking_price", type="float")
     */
    private $parkingPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="house_map", type="string", length=255)
     */
    private $houseMap;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_services", type="text")
     */
    private $additionalServices;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="working_hours", type="string", length=255)
     */
    private $workingHours;

    /**
     * @ORM\OneToMany(targetEntity="CMS\GeneralEntriesBundle\Entity\SocialNetwork", mappedBy="house")
     */
    private $socialNetworks;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CMS\HouseBundle\Entity\House\Address", mappedBy="house")
     */
    //private $addresses;

    /**
     * @var \ArrayCollection
     * @ORM\OneToMany(targetEntity="CMS\HouseBundle\Entity\House\Banner", mappedBy="house")
     */
    private $banners;

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
     * @return House
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
     * Set description
     *
     * @param string $description
     * @return House
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set banners
     *
     * @param \stdClass $banners
     * @return House
     */
    public function setBanners($banners)
    {
        $this->banners = $banners;

        return $this;
    }

    /**
     * Get banners
     *
     * @return \stdClass 
     */
    public function getBanners()
    {
        return $this->banners;
    }

    /**
     * Set addresses
     *
     * @param \stdClass $addresses
     * @return House
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Get addresses
     *
     * @return \stdClass 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Set musicGenres
     *
     * @param \stdClass $musicGenres
     * @return House
     */
    public function setMusicGenres($musicGenres)
    {
        $this->musicGenres = $musicGenres;

        return $this;
    }

    /**
     * Get musicGenres
     *
     * @return \stdClass 
     */
    public function getMusicGenres()
    {
        return $this->musicGenres;
    }

    /**
     * Set reviews
     *
     * @param \stdClass $reviews
     * @return House
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * Get reviews
     *
     * @return \stdClass 
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Set gallery
     *
     * @param \stdClass $gallery
     * @return House
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \stdClass 
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set menus
     *
     * @param \stdClass $menus
     * @return House
     */
    public function setMenus($menus)
    {
        $this->menus = $menus;

        return $this;
    }

    /**
     * Get menus
     *
     * @return \stdClass 
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     * @return House
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string 
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set physicalSpace
     *
     * @param string $physicalSpace
     * @return House
     */
    public function setPhysicalSpace($physicalSpace)
    {
        $this->physicalSpace = $physicalSpace;

        return $this;
    }

    /**
     * Get physicalSpace
     *
     * @return string 
     */
    public function getPhysicalSpace()
    {
        return $this->physicalSpace;
    }

    /**
     * Set parkingPrice
     *
     * @param float $parkingPrice
     * @return House
     */
    public function setParkingPrice($parkingPrice)
    {
        $this->parkingPrice = $parkingPrice;

        return $this;
    }

    /**
     * Get parkingPrice
     *
     * @return float 
     */
    public function getParkingPrice()
    {
        return $this->parkingPrice;
    }

    /**
     * Set houseMap
     *
     * @param string $houseMap
     * @return House
     */
    public function setHouseMap($houseMap)
    {
        if(!empty($houseMap))
        {
            $Tools = new Tools();
            $this->houseMap = $Tools->uploadFile($houseMap, 'web/uploads/house');
        }

        return $this;
    }

    /**
     * Get houseMap
     *
     * @return string 
     */
    public function getHouseMap()
    {
        return $this->houseMap;
    }


    /**
     * Set additionalServices
     *
     * @param string $additionalServices
     * @return House
     */
    public function setAdditionalServices($additionalServices)
    {
        $this->additionalServices = $additionalServices;

        return $this;
    }

    /**
     * Get additionalServices
     *
     * @return string 
     */
    public function getAdditionalServices()
    {
        return $this->additionalServices;
    }

    /**
     * Set phone
     *
     * @param \stdClass $phone
     * @return House
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \stdClass 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return House
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
     * Set workingHours
     *
     * @param string $workingHours
     * @return House
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    /**
     * Get workingHours
     *
     * @return string 
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    /**
     * Set socialNetworks
     *
     * @param \stdClass $socialNetworks
     * @return House
     */
    public function setSocialNetworks($socialNetworks)
    {
        $this->socialNetworks = $socialNetworks;

        return $this;
    }

    /**
     * Get socialNetworks
     *
     * @return \stdClass 
     */
    public function getSocialNetworks()
    {
        return $this->socialNetworks;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return House
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return House
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return House
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
