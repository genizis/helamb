<?php

namespace CMS\HouseBundle\Entity\House\Menu;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Item
 *
 * @ORM\Table(name="house_menu_item")
 * @ORM\Entity
 */
class Item
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="promotional_price", type="float")
     */
    private $promotionalPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="promotional_price_from", type="date")
     */
    private $promotionalPriceFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="promotional_price_to", type="date")
     */
    private $promotionalPriceTo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="promotional_price_time_from", type="time")
     */
    private $promotionalPriceTimeFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="promotional_price_time_to", type="time")
     */
    private $promotionalPriceTimeTo;

    /**
     * @var integer
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var \CMS\HouseBundle\Entity\House\Menu\Section
     *
     * @ORM\ManyToOne(targetEntity="CMS\HouseBundle\Entity\House\Menu\Section")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     * })
     */
    private $section;


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
     * @return Item
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
     * Set price
     *
     * @param float $price
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set promotionalPrice
     *
     * @param float $promotionalPrice
     * @return Item
     */
    public function setPromotionalPrice($promotionalPrice)
    {
        $this->promotionalPrice = $promotionalPrice;

        return $this;
    }

    /**
     * Get promotionalPrice
     *
     * @return float 
     */
    public function getPromotionalPrice()
    {
        return $this->promotionalPrice;
    }

    /**
     * Set promotionalPriceFrom
     *
     * @param \DateTime $promotionalPriceFrom
     * @return Item
     */
    public function setPromotionalPriceFrom($promotionalPriceFrom)
    {
        $this->promotionalPriceFrom = $promotionalPriceFrom;

        return $this;
    }

    /**
     * Get promotionalPriceFrom
     *
     * @return \DateTime 
     */
    public function getPromotionalPriceFrom()
    {
        return $this->promotionalPriceFrom;
    }

    /**
     * Set promotionalPriceTo
     *
     * @param \DateTime $promotionalPriceTo
     * @return Item
     */
    public function setPromotionalPriceTo($promotionalPriceTo)
    {
        $this->promotionalPriceTo = $promotionalPriceTo;

        return $this;
    }

    /**
     * Get promotionalPriceTo
     *
     * @return \DateTime 
     */
    public function getPromotionalPriceTo()
    {
        return $this->promotionalPriceTo;
    }

    /**
     * Set promotionalPriceTimeFrom
     *
     * @param \DateTime $promotionalPriceTimeFrom
     * @return Item
     */
    public function setPromotionalPriceTimeFrom($promotionalPriceTimeFrom)
    {
        $this->promotionalPriceTimeFrom = $promotionalPriceTimeFrom;

        return $this;
    }

    /**
     * Get promotionalPriceTimeFrom
     *
     * @return \DateTime 
     */
    public function getPromotionalPriceTimeFrom()
    {
        return $this->promotionalPriceTimeFrom;
    }

    /**
     * Set promotionalPriceTimeTo
     *
     * @param \DateTime $promotionalPriceTimeTo
     * @return Item
     */
    public function setPromotionalPriceTimeTo($promotionalPriceTimeTo)
    {
        $this->promotionalPriceTimeTo = $promotionalPriceTimeTo;

        return $this;
    }

    /**
     * Get promotionalPriceTimeTo
     *
     * @return \DateTime 
     */
    public function getPromotionalPriceTimeTo()
    {
        return $this->promotionalPriceTimeTo;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param Section $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }
}
