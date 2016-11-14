<?php

namespace AppBundle\Document;

use AppBundle\Document\Campaign\CampaignLink;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TrackImpression.
 *
 * @ODM\Collection(name="TrackImpression")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackImpression
{
    /**
     * @var string
     *
     * @ODM\Field(name="id", type="string")
     * @ODM\Id(strategy="UUID", type="string")
     */
    private $id;

    /**
     * @var string
     *
     * @ODM\Field(name="referer", type="string", nullable=true)
     */
    private $referer;

    /**
     * @var string
     *
     * @ODM\Field(name="ip", type="string")
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="updatedTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedTs;

    /**
     * @var bool
     *
     * @ODM\Field(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackClick", mappedBy="trackImpression", cascade={"persist"})
     */
    private $trackClicks;

    /**
     * @var \AppBundle\Document\Publisher\Publisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Publisher\Publisher", inversedBy="trackImpressions")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Publisher\Publisher")
     */
    private $publisher;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\CampaignLink", inversedBy="trackImpressions")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\CampaignLink")
     */
    private $campaignLink;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->trackClicks = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
     * @param bool $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * @param string $referer
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;
    }

    /**
     * @return \AppBundle\Document\Publisher\Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param \AppBundle\Document\Publisher\Publisher $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \AppBundle\Document\Campaign\CampaignLink
     */
    public function getCampaignLink()
    {
        return $this->campaignLink;
    }

    /**
     * @param \AppBundle\Document\Campaign\CampaignLink $campaignLink
     */
    public function setCampaignLink($campaignLink)
    {
        $this->campaignLink = $campaignLink;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrackClicks()
    {
        return $this->trackClicks;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $trackClicks
     */
    public function setTrackClicks($trackClicks)
    {
        $this->trackClicks = $trackClicks;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedTs()
    {
        return $this->updatedTs;
    }

    /**
     * @param \DateTime $updatedTs
     */
    public function setUpdatedTs($updatedTs)
    {
        $this->updatedTs = $updatedTs;
    }
}
