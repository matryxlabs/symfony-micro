<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Publisher\Publisher;
use AppBundle\Entity\Campaign\Campaign;
use AppBundle\Entity\Campaign\CampaignLink;
use AppBundle\Entity\Campaign\CampaignPublisher;
use AppBundle\Entity\Lead\Lead;
use AppBundle\Entity\Lead\LeadFlagHistory;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TrackConversion.
 *
 * @ORM\Table(name="TrackConversion")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackConversion
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
     * @ORM\Column(name="linkSubId", type="string", length=255, nullable=true)
     */
    private $linkSubId;

    /**
     * @var string
     *
     * @ORM\Column(name="orderId", type="string", length=255)
     */
    private $orderId;

    /**
     * @var bool
     *
     * @ORM\Column(name="linkActive", type="boolean")
     */
    private $linkActive;

    /**
     * @var bool
     *
     * @ORM\Column(name="campaignActive", type="boolean")
     */
    private $campaignActive;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="string", length=255, nullable=true)
     */
    private $referer;

    /**
     * @var string
     *
     * @ORM\Column(name="cookie", type="string", length=255, nullable=true)
     */
    private $cookie;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Channel")
     */
    private $channel;

    /**
     * @var string
     *
     * @ORM\Column(name="linkIp", type="string", length=255)
     */
    private $linkIp;

    /**
     * @var string
     *
     * @ORM\Column(name="serverData", type="string", length=255)
     */
    private $serverData;

    /**
     * @var string
     *
     * @ORM\Column(name="forwardingUrl", type="string", length=255, nullable=true)
     */
    private $forwardingUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="basketValue", type="decimal", scale=2, nullable=true)
     */
    private $basketValue;

    /**
     * @var string
     *
     * @ORM\Column(name="basketCurrency", type="string", length=255)
     */
    private $basketCurrency;

    /**
     * @var string
     *
     * @ORM\Column(name="tagFiringUrl", type="string", length=255)
     */
    private $tagFiringUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="tagCookie", type="string", length=255, nullable=true)
     */
    private $tagCookie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdTs", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdTs;

    /**
     * @var string
     *
     * @ORM\Column(name="tagIp", type="string", length=255)
     */
    private $tagIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var Publisher
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Publisher\Publisher", inversedBy="trackConversions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publisherId", referencedColumnName="id", nullable=true)
     * })
     */
    private $publisher;

    /**
     * @var Campaign
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Campaign\Campaign", inversedBy="trackConversions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignId", referencedColumnName="id")
     * })
     */
    private $campaign;

    /**
     * @var TrackClick
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TrackClick", inversedBy="trackConversions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trackClickId", referencedColumnName="id", nullable=true)
     * })
     */
    private $trackClick;

    /**
     * @var CampaignLink
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Campaign\CampaignLink", inversedBy="trackConversions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignLinkId", referencedColumnName="id")
     * })
     */
    private $campaignLink;

    /**
     * @var Lead
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lead\Lead", inversedBy="trackConversion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leadId", referencedColumnName="id")
     * })
     */
    private $lead;

    /**
     * @var CampaignPublisher
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Campaign\CampaignPublisher", inversedBy="trackConversion")
     */
    private $campaignPublisher;

    /**
     * @var int
     *
     * @ORM\Column(name="publisherPayout", type="decimal", scale=2, nullable=true)
     */
    private $publisherPayout;

    /**
     * @var int
     *
     * @ORM\Column(name="advertiserPayout", type="decimal", scale=2, nullable=true)
     */
    private $advertiserPayout;

    /**
     * @var int
     *
     * @ORM\Column(name="baseCurrencyPublisherPayout", type="decimal", scale=2, nullable=true)
     */
    private $baseCurrencyPublisherPayout;

    /**
     * @var int
     *
     * @ORM\Column(name="baseCurrencyAdvertiserPayout", type="decimal", scale=2, nullable=true)
     */
    private $baseCurrencyAdvertiserPayout;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lead\LeadFlagHistory", mappedBy="trackConversion")
     */
    private $leadFlagHistory;

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
