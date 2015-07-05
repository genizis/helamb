<?php

namespace CMS\ArtistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity
 */
class Artist
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
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"name", "id"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="equipment", type="text")
     */
    private $equipment;

    /**
     * @var string
     *
     * @ORM\Column(name="staff", type="text")
     */
    private $staff;

    /**
     * @var \CMS\CityBundle\Entity\City
     *
     * @ORM\ManyToOne(targetEntity="CMS\CityBundle\Entity\City", joinColumns={@ORM\JoinColumn(name="city_id", referencedColumnName="id"))
     */
    private $city;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="CMS\ArtistBundle\Entity\Artist\Phone", mappedBy="artist")
     */
    private $phones;

    /**
     * @var ArrayCollection $musicGenres
     *
     * @ORM\ManyToMany(targetEntity="CMS\GeneralEntriesBundle\Entity\MusicGenre", cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *      name="artist_music_genres",
     *      joinColumns={@ORM\JoinColumn(name="artist_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="music_genre_id", referencedColumnName="id")}
     * )
     */
    private $musicGenres;

    /**
     * @var array
     *
     * @ORM\Column(name="songs", type="array")
     */
    private $songs;

    /**
     * @var array
     *
     * @ORM\Column(name="videos", type="array")
     */
    private $videos;

    /**
     * @var array
     *
     * @ORM\Column(name="photos", type="array")
     */
    private $photos;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="setlist", type="object")
     */
    private $setlist;

    /**
     * @var array
     *
     * @ORM\Column(name="social_networks", type="array")
     */
    private $socialNetworks;


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
     * @return Artist
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
     * @return Artist
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
     * Set image
     *
     * @param string $image
     * @return Artist
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Artist
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
     * @return Artist
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
     * Set slug
     *
     * @param string $slug
     * @return Artist
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Artist
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
     * Set equipment
     *
     * @param string $equipment
     * @return Artist
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment
     *
     * @return string 
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * Set staff
     *
     * @param string $staff
     * @return Artist
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * Get staff
     *
     * @return string 
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * Set city
     *
     * @param \stdClass $city
     * @return Artist
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
     * Set phones
     *
     * @param array $phones
     * @return Artist
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * Get phones
     *
     * @return array 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set musicGenres
     *
     * @param array $musicGenres
     * @return Artist
     */
    public function setMusicGenres($musicGenres)
    {
        $this->musicGenres = $musicGenres;

        return $this;
    }

    /**
     * Get musicGenres
     *
     * @return array 
     */
    public function getMusicGenres()
    {
        return $this->musicGenres;
    }

    /**
     * Set songs
     *
     * @param array $songs
     * @return Artist
     */
    public function setSongs($songs)
    {
        $this->songs = $songs;

        return $this;
    }

    /**
     * Get songs
     *
     * @return array 
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * Set videos
     *
     * @param array $videos
     * @return Artist
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;

        return $this;
    }

    /**
     * Get videos
     *
     * @return array 
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Set photos
     *
     * @param array $photos
     * @return Artist
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return array 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set setlist
     *
     * @param \stdClass $setlist
     * @return Artist
     */
    public function setSetlist($setlist)
    {
        $this->setlist = $setlist;

        return $this;
    }

    /**
     * Get setlist
     *
     * @return \stdClass 
     */
    public function getSetlist()
    {
        return $this->setlist;
    }

    /**
     * Set socialNetworks
     *
     * @param array $socialNetworks
     * @return Artist
     */
    public function setSocialNetworks($socialNetworks)
    {
        $this->socialNetworks = $socialNetworks;

        return $this;
    }

    /**
     * Get socialNetworks
     *
     * @return array 
     */
    public function getSocialNetworks()
    {
        return $this->socialNetworks;
    }
}
