<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TrackImpression.
 *
 * @ODM\Collection(name="TrackImpression")
 * @ODM\Document
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackImpression
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="text", nullable=true)
     */
    private $referer;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedTs", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedTs;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\TrackClick", mappedBy="trackImpression", cascade={"persist"})
     */
    private $trackClicks;

    /**
     * @var \AppBundle\Document\Publisher\Publisher
     *
     * @ODM\ReferenceOne(targetEntity="AppBundle\Document\Publisher\Publisher", inversedBy="trackImpressions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publisherId", referencedColumnName="id")
     * })
     */
    private $publisher;

    /**
     * @var \AppBundle\Document\Campaign\CampaignLink
     *
     * @ODM\ReferenceOne(targetEntity="AppBundle\Document\Campaign\CampaignLink", inversedBy="trackImpressions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignLinkId", referencedColumnName="id")
     * })
     */
    private $campaignLink;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->trackClicks = new \Doctrine\Common\Collections\ArrayCollection();
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
