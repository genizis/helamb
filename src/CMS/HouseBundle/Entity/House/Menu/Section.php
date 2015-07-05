<?php

namespace CMS\HouseBundle\Entity\House\Menu;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Section
 *
 * @ORM\Table(name="house_menu_section")
 * @ORM\Entity
 */
class Section
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
     * @var \CMS\HouseBundle\Entity\House\Menu
     *
     * @ORM\ManyToOne(targetEntity="CMS\HouseBundle\Entity\House\Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu_id", referencedColumnName="id")
     * })
     */
    private $menu;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set menu
     *
     * @param \stdClass $menu
     * @return Section
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \stdClass 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Section
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
     * Set position
     *
     * @param integer $position
     * @return Section
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return \CMS\HouseBundle\Entity\House
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @param \CMS\HouseBundle\Entity\House $house
     */
    public function setHouse($house)
    {
        $this->house = $house;
    }
}
