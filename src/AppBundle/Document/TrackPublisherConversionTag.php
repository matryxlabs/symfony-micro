<?php

namespace AppBundle\Document;

use AppBundle\Document\Publisher\Publisher;
use AppBundle\Document\Campaign\Campaign;
use AppBundle\Document\Campaign\CampaignLink;
use AppBundle\Document\Lead\Lead;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TrackPublisherConversionTag.
 *
 * @ODM\Collection(name="TrackPublisherConversionTag")
 * @ODM\Document
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackPublisherConversionTag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\Column(name="request", type="text")
     */
    private $request;

    /**
     * @var string
     *
     * @ORM\Column(name="response", type="text")
     */
    private $response;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateTs", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updateTs;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\Publisher\Publisher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publisherId", referencedColumnName="id")
     * })
     */
    private $publisher;

    /**
     * @var Campaign
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\Campaign\Campaign")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignId", referencedColumnName="id")
     * })
     */
    private $campaign;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\Campaign\CampaignLink")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignLinkId", referencedColumnName="id")
     * })
     */
    private $campaignLink;

    /**
     * @var Lead
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\Lead\Lead")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leadId", referencedColumnName="id")
     * })
     */
    private $lead;

    /**
     * @var string
     *
     * @ORM\Column(name="orderId", type="string", length=255, nullable=true)
     */
    private $orderId;

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
     * @return TrackPublisherConversionTag
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
     * Set request.
     *
     * @param string $request
     *
     * @return TrackPublisherConversionTag
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request.
     *
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set response.
     *
     * @param string $response
     *
     * @return TrackPublisherConversionTag
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set updateTs.
     *
     * @param \DateTime $updateTs
     *
     * @return TrackPublisherConversionTag
     */
    public function setUpdateTs($updateTs)
    {
        $this->updateTs = $updateTs;

        return $this;
    }

    /**
     * Get updateTs.
     *
     * @return \DateTime
     */
    public function getUpdateTs()
    {
        return $this->updateTs;
    }

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return TrackPublisherConversionTag
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
     * Set visible.
     *
     * @param bool $visible
     *
     * @return TrackPublisherConversionTag
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
     * @return TrackPublisherConversionTag
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
     * @return TrackPublisherConversionTag
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
     * Set campaignLink.
     *
     * @param CampaignLink $campaignLink
     *
     * @return TrackPublisherConversionTag
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
     * @return TrackPublisherConversionTag
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
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }
}
