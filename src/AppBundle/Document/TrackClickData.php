<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * TrackClickData
 *
 * @ODM\Collection(name="TrackClickData")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackClickData
{
    /**
     * @var integer
     *
     * @ODM\Field(name="id", type="integer")
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ODM\Field(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ODM\Field(name="value", type="string")
     */
    private $value;

    /**
     * @var TrackClick
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\TrackClick", inversedBy="clickData")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\TrackClick")
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
