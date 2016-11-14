<?php

namespace AppBundle\Document;

use AppBundle\Document\Publisher\Publisher;
use AppBundle\Document\Campaign\CampaignLink;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TrackClick.
 *
 * @ODM\Collection(name="TrackClick")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackClick
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
     * @ODM\Field(name="linkSubId", type="string", nullable=true)
     */
    private $linkSubId;

    /**
     * @var bool
     *
     * @ODM\Field(name="linkEnabled", type="boolean")
     */
    private $linkEnabled;

    /**
     * @var bool
     *
     * @ODM\Field(name="campaignEnabled", type="boolean")
     */
    private $campaignEnabled;

    /**
     * @var string
     *
     * @ODM\Field(name="serverSession", type="string")
     */
    private $serverSession;

    /**
     * @var string
     *
     * @ODM\Field(name="referer", type="string", nullable=true)
     */
    private $referer;

    /**
     * @var string
     *
     * @ODM\Field(name="cookie", type="string")
     */
    private $cookie;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="createdTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdTs;

    /**
     * @var string
     *
     * @ODM\Field(name="ip", type="string")
     */
    private $ip;

    /**
     * @var string
     *
     * @ODM\Field(name="serverData", type="string")
     */
    private $serverData;

    /**
     * @var string
     *
     * @ODM\Field(name="forwardingUrl", type="string")
     */
    private $forwardingUrl;

    /**
     * @var bool
     *
     * @ODM\Field(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var int
     *
     * @ODM\Field(name="fingerprint", type="string", nullable=true)
     */
    private $fingerprint;

    /**
     * @var bool
     *
     * @ODM\Field(name="unroutable", type="boolean")
     */
    private $unroutable = false;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackConversion", mappedBy="trackClick", cascade={"persist"})
     */
    private $trackConversions;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Publisher\Publisher", inversedBy="trackClicks")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Publisher\Publisher")
     */
    private $publisher;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\CampaignLink", inversedBy="trackClicks")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\CampaignLink")
     */
    private $campaignLink;

    /**
     * @var TrackImpression
     *
     * @ODM\ReferenceOne(targetDocument="TrackImpression", inversedBy="trackClicks")
     * @ODM\EmbedOne(targetDocument="TrackImpression")
     */
    private $trackImpression;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackClickData", mappedBy="click")
     */
    protected $clickData;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->trackConversions = new ArrayCollection();
        $this->clickData = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set linkSubId.
     *
     * @param string $linkSubId
     *
     * @return TrackClick
     */
    public function setLinkSubId($linkSubId)
    {
        $this->linkSubId = $linkSubId;

        return $this;
    }

    /**
     * Get linkSubId.
     *
     * @return string
     */
    public function getLinkSubId()
    {
        return $this->linkSubId;
    }

    /**
     * Set linkEnabled.
     *
     * @param bool $linkEnabled
     *
     * @return TrackClick
     */
    public function setLinkEnabled($linkEnabled)
    {
        $this->linkEnabled = $linkEnabled;

        return $this;
    }

    /**
     * Get linkEnabled.
     *
     * @return bool
     */
    public function getLinkEnabled()
    {
        return $this->linkEnabled;
    }

    /**
     * Set campaignEnabled.
     *
     * @param bool $campaignEnabled
     *
     * @return TrackClick
     */
    public function setCampaignEnabled($campaignEnabled)
    {
        $this->campaignEnabled = $campaignEnabled;

        return $this;
    }

    /**
     * Get campaignEnabled.
     *
     * @return bool
     */
    public function getCampaignEnabled()
    {
        return $this->campaignEnabled;
    }

    /**
     * Set serverSession.
     *
     * @param string $serverSession
     *
     * @return TrackClick
     */
    public function setServerSession($serverSession)
    {
        $this->serverSession = $serverSession;

        return $this;
    }

    /**
     * Get serverSession.
     *
     * @return string
     */
    public function getServerSession()
    {
        return $this->serverSession;
    }

    /**
     * Set referer.
     *
     * @param string $referer
     *
     * @return TrackClick
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer.
     *
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set cookie.
     *
     * @param string $cookie
     *
     * @return TrackClick
     */
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;

        return $this;
    }

    /**
     * Get cookie.
     *
     * @return string
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * Set createdTs.
     *
     * @param \DateTime $createdTs
     *
     * @return TrackClick
     */
    public function setCreatedTs($createdTs)
    {
        $this->createdTs = $createdTs;

        return $this;
    }

    /**
     * Get createdTs.
     *
     * @return \DateTime
     */
    public function getCreatedTs()
    {
        return $this->createdTs;
    }

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return TrackClick
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set serverData.
     *
     * @param string $serverData
     *
     * @return TrackClick
     */
    public function setServerData($serverData)
    {
        $this->serverData = $serverData;

        return $this;
    }

    /**
     * Get serverData.
     *
     * @return string
     */
    public function getServerData()
    {
        return $this->serverData;
    }

    /**
     * Set forwardingUrl.
     *
     * @param string $forwardingUrl
     *
     * @return TrackClick
     */
    public function setForwardingUrl($forwardingUrl)
    {
        $this->forwardingUrl = $forwardingUrl;

        return $this;
    }

    /**
     * Get forwardingUrl.
     *
     * @return string
     */
    public function getForwardingUrl()
    {
        return $this->forwardingUrl;
    }

    /**
     * Set visible.
     *
     * @param bool $visible
     *
     * @return TrackClick
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible.
     *
     * @return bool
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set fingerprint.
     *
     * @param int $fingerprint
     *
     * @return TrackClick
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * Get fingerprint.
     *
     * @return int
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * Set unroutable.
     *
     * @param bool $unroutable
     *
     * @return TrackClick
     */
    public function setUnroutable($unroutable)
    {
        $this->unroutable = $unroutable;

        return $this;
    }

    /**
     * Get unroutable.
     *
     * @return bool
     */
    public function getUnroutable()
    {
        return $this->unroutable;
    }

    /**
     * Add trackConversions.
     *
     * @param TrackConversion $trackConversions
     *
     * @return TrackClick
     */
    public function addTrackConversion(TrackConversion $trackConversions)
    {
        $this->trackConversions[] = $trackConversions;

        return $this;
    }

    /**
     * Remove trackConversions.
     *
     * @param TrackConversion $trackConversions
     */
    public function removeTrackConversion(TrackConversion $trackConversions)
    {
        $this->trackConversions->removeElement($trackConversions);
    }

    /**
     * Get trackConversions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrackConversions()
    {
        return $this->trackConversions;
    }

    /**
     * Set publisher.
     *
     * @param Publisher $publisher
     *
     * @return TrackClick
     */
    public function setPublisher(Publisher $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher.
     *
     * @return \AppBundle\Document\Publisher\Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set campaignLink.
     *
     * @param CampaignLink $campaignLink
     *
     * @return TrackClick
     */
    public function setCampaignLink(CampaignLink $campaignLink = null)
    {
        $this->campaignLink = $campaignLink;

        return $this;
    }

    /**
     * Get campaignLink.
     *
     * @return CampaignLink
     */
    public function getCampaignLink()
    {
        return $this->campaignLink;
    }

    /**
     * Set trackImpression.
     *
     * @param TrackImpression $trackImpression
     *
     * @return TrackClick
     */
    public function setTrackImpression(TrackImpression $trackImpression = null)
    {
        $this->trackImpression = $trackImpression;

        return $this;
    }

    /**
     * Get trackImpression.
     *
     * @return \AppBundle\Document\TrackImpression
     */
    public function getTrackImpression()
    {
        return $this->trackImpression;
    }

    /**
     * Add clickDatum
     *
     * @param TrackClickData$clickDatum
     *
     * @return TrackClick
     */
    public function addClickDatum(TrackClickData$clickDatum)
    {
        $this->clickData[] = $clickDatum;

        return $this;
    }

    /**
     * Remove clickDatum
     *
     * @param TrackClickData$clickDatum
     */
    public function removeClickDatum(TrackClickData$clickDatum)
    {
        $this->clickData->removeElement($clickDatum);
    }

    /**
     * Get clickData
     *
     * @return Collection
     */
    public function getClickData()
    {
        return $this->clickData;
    }
}
