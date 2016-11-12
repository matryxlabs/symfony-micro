<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrackClickData
 *
 * @ORM\Table(name="TrackClickData")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackClickData
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
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var TrackClick
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TrackClick", inversedBy="clickData")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clickId", referencedColumnName="id")
     * })
     */
    protected $click;


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
     *
     * @return TrackClickData
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
     * Set value
     *
     * @param string $value
     *
     * @return TrackClickData
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set click
     *
     * @param TrackClick $click
     *
     * @return TrackClickData
     */
    public function setClick(TrackClick $click = null)
    {
        $this->click = $click;

        return $this;
    }

    /**
     * Get click
     *
     * @return TrackClick
     */
    public function getClick()
    {
        return $this->click;
    }
}
