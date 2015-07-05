<?php

namespace CMS\HouseBundle\Entity\House;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Banner
 *
 * @ORM\Table(name="house_social_network")
 * @ORM\Entity
 */
class SocialNetwork
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

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
     * @var \CMS\GeneralEntriesBundle\Entity\SocialNetwork
     *
     * @ORM\ManyToOne(targetEntity="CMS\GeneralEntriesBundle\Entity\SocialNetwork")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="social_network_id", referencedColumnName="id")
     * })
     */
    private $socialNetwork;

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
     * @return \CMS\GeneralEntriesBundle\Entity\SocialNetwork
     */
    public function getSocialNetwork()
    {
        return $this->socialNetwork;
    }

    /**
     * @param \CMS\GeneralEntriesBundle\Entity\SocialNetwork $socialNetwork
     */
    public function setSocialNetwork($socialNetwork)
    {
        $this->socialNetwork = $socialNetwork;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

}
