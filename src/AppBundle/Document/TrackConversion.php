<?php

namespace AppBundle\Document;

use AppBundle\Document\Publisher\Publisher;
use AppBundle\Document\Campaign\Campaign;
use AppBundle\Document\Campaign\CampaignLink;
use AppBundle\Document\Campaign\CampaignPublisher;
use AppBundle\Document\Lead\Lead;
use AppBundle\Document\Lead\LeadFlagHistory;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TrackConversion.
 *
 * @ODM\Collection(name="TrackConversion")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackConversion
{

    /**
     * @var string
     *
     * @ODM\Field(name="id", type="string")
     * @ODM\Id(strategy="UUID", type="string")
     */
    public $id;

    /**
     * @var string
     *
     * @ODM\Field(name="linkSubId", type="string", nullable=true)
     */
    public $linkSubId;

    /**
     * @var string
     *
     * @ODM\Field(name="orderId", type="string")
     */
    public $orderId;

    /**
     * @var bool
     *
     * @ODM\Field(name="linkActive", type="boolean")
     */
    public $linkActive;

    /**
     * @var bool
     *
     * @ODM\Field(name="campaignActive", type="boolean")
     */
    public $campaignActive;

    /**
     * @var string
     *
     * @ODM\Field(name="referer", type="string", nullable=true)
     */
    public $referer;

    /**
     * @var string
     *
     * @ODM\Field(name="cookie", type="string", nullable=true)
     */
    public $cookie;

    /**
     * @var string
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Channel")
     */
    public $channel;

    /**
     * @var string
     *
     * @ODM\Field(name="linkIp", type="string")
     */
    public $linkIp;

    /**
     * @var string
     *
     * @ODM\Field(name="serverData", type="string")
     */
    public $serverData;

    /**
     * @var string
     *
     * @ODM\Field(name="forwardingUrl", type="string", nullable=true)
     */
    public $forwardingUrl;

    /**
     * @var string
     *
     * @ODM\Field(name="basketValue", type="string", nullable=true)
     */
    public $basketValue;

    /**
     * @var string
     *
     * @ODM\Field(name="basketCurrency", type="string")
     */
    public $basketCurrency;

    /**
     * @var string
     *
     * @ODM\Field(name="tagFiringUrl", type="string")
     */
    public $tagFiringUrl;

    /**
     * @var string
     *
     * @ODM\Field(name="tagCookie", type="string", nullable=true)
     */
    public $tagCookie;

    /**
     * @var string
     *
     * @ODM\Field(name="createdTs", type="string")
     * @Gedmo\Timestampable(on="create")
     */
    public $createdTs;

    /**
     * @var string
     *
     * @ODM\Field(name="tagIp", type="string")
     */
    public $tagIp;

    /**
     * @var string
     *
     * @ODM\Field(name="updatedAt", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    public $updatedAt;

    /**
     * @var bool
     *
     * @ODM\Field(name="visible", type="boolean")
     */
    public $visible;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Publisher\Publisher", inversedBy="trackConversions")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Publisher\Publisher")
     */
    public $publisher;

    /**
     * @var Campaign
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\Campaign", inversedBy="trackConversions")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\Campaign")
     */
    public $campaign;

    /**
     * @var TrackClick
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\TrackClick", inversedBy="trackConversions")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\TrackClick")
     */
    public $trackClick;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\CampaignLink", inversedBy="trackConversions")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\CampaignLink")
     */
    public $campaignLink;

    /**
     * @var Lead
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Lead\Lead", inversedBy="trackConversion")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Lead\Lead")
     */
    public $lead;

    /**
     * @var CampaignPublisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\CampaignPublisher", inversedBy="trackConversion")
     */
    public $campaignPublisher;

    /**
     * @var int
     *
     * @ODM\Field(name="publisherPayout", type="string", nullable=true)
     */
    public $publisherPayout;

    /**
     * @var int
     *
     * @ODM\Field(name="advertiserPayout", type="string", nullable=true)
     */
    public $advertiserPayout;

    /**
     * @var int
     *
     * @ODM\Field(name="baseCurrencyPublisherPayout", type="string", nullable=true)
     */
    public $baseCurrencyPublisherPayout;

    /**
     * @var int
     *
     * @ODM\Field(name="baseCurrencyAdvertiserPayout", type="string", nullable=true)
     */
    public $baseCurrencyAdvertiserPayout;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Lead\LeadFlagHistory", mappedBy="trackConversion")
     */
    public $leadFlagHistory;

    public function __construct()
    {
        $this->leadFlagHistory = new ArrayCollection();
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
     * @return TrackConversion
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
     * Set orderId.
     *
     * @param string $orderId
     *
     * @return TrackConversion
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId.
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set linkActive.
     *
     * @param bool $linkActive
     *
     * @return TrackConversion
     */
    public function setLinkActive($linkActive)
    {
        $this->linkActive = $linkActive;

        return $this;
    }

    /**
     * Get linkActive.
     *
     * @return bool
     */
    public function getLinkActive()
    {
        return $this->linkActive;
    }

    /**
     * Set campaignActive.
     *
     * @param bool $campaignActive
     *
     * @return TrackConversion
     */
    public function setCampaignActive($campaignActive)
    {
        $this->campaignActive = $campaignActive;

        return $this;
    }

    /**
     * Get campaignActive.
     *
     * @return bool
     */
    public function getCampaignActive()
    {
        return $this->campaignActive;
    }

    /**
     * Set referer.
     *
     * @param string $referer
     *
     * @return TrackConversion
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
     * @return TrackConversion
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
     * Set channel.
     *
     * @param Channel $channel
     *
     * @return TrackConversion
     */
    public function setChannel(Channel $channel = null)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set linkIp.
     *
     * @param string $linkIp
     *
     * @return TrackConversion
     */
    public function setLinkIp($linkIp)
    {
        $this->linkIp = $linkIp;

        return $this;
    }

    /**
     * Get linkIp.
     *
     * @return string
     */
    public function getLinkIp()
    {
        return $this->linkIp;
    }

    /**
     * Set serverData.
     *
     * @param string $serverData
     *
     * @return TrackConversion
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
     * @return TrackConversion
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
     * Set basketValue.
     *
     * @param string $basketValue
     *
     * @return TrackConversion
     */
    public function setBasketValue($basketValue)
    {
        $this->basketValue = $basketValue;

        return $this;
    }

    /**
     * Get basketValue.
     *
     * @return string
     */
    public function getBasketValue()
    {
        return $this->basketValue;
    }

    /**
     * Set basketCurrency.
     *
     * @param string $basketCurrency
     *
     * @return TrackConversion
     */
    public function setBasketCurrency($basketCurrency)
    {
        $this->basketCurrency = $basketCurrency;

        return $this;
    }

    /**
     * Get basketCurrency.
     *
     * @return string
     */
    public function getBasketCurrency()
    {
        return $this->basketCurrency;
    }

    /**
     * Set tagFiringUrl.
     *
     * @param string $tagFiringUrl
     *
     * @return TrackConversion
     */
    public function setTagFiringUrl($tagFiringUrl)
    {
        $this->tagFiringUrl = $tagFiringUrl;

        return $this;
    }

    /**
     * Get tagFiringUrl.
     *
     * @return string
     */
    public function getTagFiringUrl()
    {
        return $this->tagFiringUrl;
    }

    /**
     * Set tagCookie.
     *
     * @param string $tagCookie
     *
     * @return TrackConversion
     */
    public function setTagCookie($tagCookie)
    {
        $this->tagCookie = $tagCookie;

        return $this;
    }

    /**
     * Get tagCookie.
     *
     * @return string
     */
    public function getTagCookie()
    {
        return $this->tagCookie;
    }

    /**
     * Set createdTs.
     *
     * @param \DateTime $createdTs
     *
     * @return TrackConversion
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
     * Set tagIp.
     *
     * @param string $tagIp
     *
     * @return TrackConversion
     */
    public function setTagIp($tagIp)
    {
        $this->tagIp = $tagIp;

        return $this;
    }

    /**
     * Get tagIp.
     *
     * @return string
     */
    public function getTagIp()
    {
        return $this->tagIp;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return TrackConversion
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set visible.
     *
     * @param bool $visible
     *
     * @return TrackConversion
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
     * Set publisher.
     *
     * @param Publisher $publisher
     *
     * @return TrackConversion
     */
    public function setPublisher(Publisher $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher.
     *
     * @return Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set campaign.
     *
     * @param Campaign $campaign
     *
     * @return TrackConversion
     */
    public function setCampaign(Campaign $campaign = null)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get campaign.
     *
     * @return Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Set trackClick.
     *
     * @param TrackClick $trackClick
     *
     * @return TrackConversion
     */
    public function setTrackClick(TrackClick $trackClick = null)
    {
        $this->trackClick = $trackClick;

        return $this;
    }

    /**
     * Get trackClick.
     *
     * @return TrackClick
     */
    public function getTrackClick()
    {
        return $this->trackClick;
    }

    /**
     * Set campaignLink.
     *
     * @param CampaignLink $campaignLink
     *
     * @return TrackConversion
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
     * Set lead.
     *
     * @param Lead $lead
     *
     * @return TrackConversion
     */
    public function setLead(Lead $lead = null)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * Get lead.
     *
     * @return Lead
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @return int
     */
    public function getPublisherPayout()
    {
        return $this->publisherPayout;
    }

    /**
     * @param $publisherPayout
     * @return $this
     */
    public function setPublisherPayout($publisherPayout)
    {
        $this->publisherPayout = $publisherPayout;

        return $this;
    }

    /**
     * @return int
     */
    public function getAdvertiserPayout()
    {
        return $this->advertiserPayout;
    }

    /**
     * @param $advertiserPayout
     * @return $this
     */
    public function setAdvertiserPayout($advertiserPayout)
    {
        $this->advertiserPayout = $advertiserPayout;

        return $this;
    }

    /**
     * Add leadFlagHistory.
     *
     * @param LeadFlagHistory $leadFlagHistory
     *
     * @return TrackConversion
     */
    public function addLeadFlagHistory(LeadFlagHistory $leadFlagHistory)
    {
        $this->leadFlagHistory[] = $leadFlagHistory;

        return $this;
    }

    /**
     * Remove leadFlagHistory.
     *
     * @param LeadFlagHistory $leadFlagHistory
     */
    public function removeLeadFlagHistory(LeadFlagHistory $leadFlagHistory)
    {
        $this->leadFlagHistory->removeElement($leadFlagHistory);
    }

    /**
     * Get leadFlagHistory.
     *
     * @return Collection
     */
    public function getLeadFlagHistory($order = 'desc', $limit = 3)
    {
        $criteria = Criteria::create();

        return $this->leadFlagHistory->matching($criteria->orderBy(['id' => $order])->setMaxResults($limit));
    }

    /**
     * Set campaignPublisher.
     *
     * @param CampaignPublisher $campaignPublisher
     *
     * @return TrackConversion
     */
    public function setCampaignPublisher(CampaignPublisher $campaignPublisher = null)
    {
        $this->campaignPublisher = $campaignPublisher;

        return $this;
    }

    /**
     * Get campaignPublisher.
     *
     * @return CampaignPublisher
     */
    public function getCampaignPublisher()
    {
        return $this->campaignPublisher;
    }

    /**
     * Set baseCurrencyPublisherPayout.
     *
     * @param string $baseCurrencyPublisherPayout
     *
     * @return TrackConversion
     */
    public function setBaseCurrencyPublisherPayout($baseCurrencyPublisherPayout)
    {
        $this->baseCurrencyPublisherPayout = $baseCurrencyPublisherPayout;

        return $this;
    }

    /**
     * Get baseCurrencyPublisherPayout.
     *
     * @return string
     */
    public function getBaseCurrencyPublisherPayout()
    {
        return $this->baseCurrencyPublisherPayout;
    }

    /**
     * Set baseCurrencyAdvertiserPayout.
     *
     * @param string $baseCurrencyAdvertiserPayout
     *
     * @return TrackConversion
     */
    public function setBaseCurrencyAdvertiserPayout($baseCurrencyAdvertiserPayout)
    {
        $this->baseCurrencyAdvertiserPayout = $baseCurrencyAdvertiserPayout;

        return $this;
    }

    /**
     * Get baseCurrencyAdvertiserPayout.
     *
     * @return string
     */
    public function getBaseCurrencyAdvertiserPayout()
    {
        return $this->baseCurrencyAdvertiserPayout;
    }
}
