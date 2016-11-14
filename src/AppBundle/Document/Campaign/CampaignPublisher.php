<?php

namespace AppBundle\Document\Campaign;

use AppBundle\Document\TrackConversion;
use AppBundle\Document\Lead\Lead;
use AppBundle\Document\Publisher\Publisher;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CampaignPublisher.
 *
 * @ODM\Collection(name="CampaignPublisher")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class CampaignPublisher
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
     * @ODM\Field(name="baseCurrencyPayout", type="string")
     * @Gedmo\Versioned
     */
    private $baseCurrencyPayout;

    /**
     * @var string
     *
     * @ODM\Field(name="payout", type="string")
     * @Gedmo\Versioned
     */
    private $payout;

    /**
     * @var int
     *
     * @ODM\Field(name="leadsRequired", type="integer")
     * @Gedmo\Versioned
     */
    private $leadsRequired;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="startTs", type="string")
     */
    private $startTs;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="endTs", type="string", nullable=true)
     */
    private $endTs;

    /**
     * @var string
     *
     * @ODM\Field(name="signName", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $signName;

    /**
     * @var string
     *
     * @ODM\Field(name="signRole", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $signRole;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="signedTs", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $signedTs;

    /**
     * @var string
     *
     * @ODM\Field(name="signedIp", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $signedIp;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="updatedTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedTs;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="createdTs", type="string")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdTs;

    /**
     * @var string
     *
     * @ODM\Field(name="terms", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $terms;

    /**
     * @var string
     *
     * @ODM\Field(name="linkHash", type="string")
     */
    private $linkHash;

    /**
     * @var bool
     *
     * @ODM\Field(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var string
     *
     * @ODM\Field(name="current", type="boolean")
     */
    private $current = false;

    /**
     * @var Campaign
     *
     * @ODM\ReferenceOne(targetDocument="\AppBundle\Document\Campaign\Campaign", inversedBy="campaignPublishers")
     * @ODM\EmbedOne(targetDocument="\AppBundle\Document\Campaign\Campaign")
     */
    private $campaign;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Lead\Lead", mappedBy="campaignPublisher", cascade={"persist"})
     */
    private $leads;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackConversion", mappedBy="campaignPublisher", cascade={"persist"})
     */
    private $trackConversion;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Publisher\Publisher", inversedBy="campaignPublishers", cascade="persist")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Publisher\Publisher")
     */
    private $publisher;

    /**
     * @return Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param Publisher $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
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
     * Set payout.
     *
     * @param string $payout
     *
     * @return CampaignPublisher
     */
    public function setPayout($payout)
    {
        $this->payout = $payout;

        return $this;
    }

    /**
     * Get payout.
     *
     * @return string
     */
    public function getPayout()
    {
        return $this->payout;
    }

    /**
     * Set leadsRequired.
     *
     * @param int $leadsRequired
     *
     * @return CampaignPublisher
     */
    public function setLeadsRequired($leadsRequired)
    {
        $this->leadsRequired = $leadsRequired;

        return $this;
    }

    /**
     * Get leadsRequired.
     *
     * @return int
     */
    public function getLeadsRequired()
    {
        return $this->leadsRequired;
    }

    /**
     * Set startTs.
     *
     * @param \DateTime $startTs
     *
     * @return CampaignPublisher
     */
    public function setStartTs($startTs)
    {
        $this->startTs = json_encode($startTs);

        return $this;
    }

    /**
     * Get startTs.
     *
     * @return \DateTime
     */
    public function getStartTs()
    {
        return (object) json_decode($this->startTs);
    }

    /**
     * Set endTs.
     *
     * @param \DateTime $endTs
     *
     * @return CampaignPublisher
     */
    public function setEndTs($endTs)
    {
        $this->endTs = json_encode($endTs);

        return $this;
    }

    /**
     * Get endTs.
     *
     * @return \DateTime
     */
    public function getEndTs()
    {
        return (object) json_decode($this->endTs);
    }

    /**
     * Set signName.
     *
     * @param string $signName
     *
     * @return CampaignPublisher
     */
    public function setSignName($signName)
    {
        $this->signName = $signName;

        return $this;
    }

    /**
     * Get signName.
     *
     * @return string
     */
    public function getSignName()
    {
        return $this->signName;
    }

    /**
     * Set signRole.
     *
     * @param string $signRole
     *
     * @return CampaignPublisher
     */
    public function setSignRole($signRole)
    {
        $this->signRole = $signRole;

        return $this;
    }

    /**
     * Get signRole.
     *
     * @return string
     */
    public function getSignRole()
    {
        return $this->signRole;
    }

    /**
     * Set signedTs.
     *
     * @param \DateTime $signedTs
     *
     * @return CampaignPublisher
     */
    public function setSignedTs($signedTs)
    {
        $this->signedTs = json_encode($signedTs);

        return $this;
    }

    /**
     * Get signedTs.
     *
     * @return \DateTime
     */
    public function getSignedTs()
    {
        return (object) json_decode($this->signedTs);
    }

    /**
     * Set signedIp.
     *
     * @param string $signedIp
     *
     * @return CampaignPublisher
     */
    public function setSignedIp($signedIp)
    {
        $this->signedIp = $signedIp;

        return $this;
    }

    /**
     * Get signedIp.
     *
     * @return string
     */
    public function getSignedIp()
    {
        return $this->signedIp;
    }

    /**
     * Set updatedTs.
     *
     * @param \Datetime $date
     *
     * @return CampaignPublisher
     */
    public function setUpdatedTs(\Datetime $date)
    {
        $this->updatedTs = json_encode($date);

        return $this;
    }

    /**
     * Get updatedTs.
     *
     * @return \DateTime
     */
    public function getUpdatedTs()
    {
        return (object) json_decode($this->updatedTs);
    }

    /**
     * Set createdTs.
     *
     * @ODM\PrePersist
     *
     * @return CampaignPublisher
     */
    public function setCreatedTs()
    {
        $this->createdTs = json_encode(new \DateTime());

        return $this;
    }

    /**
     * Get createdTs.
     *
     * @return \DateTime
     */
    public function getCreatedTs()
    {
        return (object) json_decode($this->createdTs);
    }

    /**
     * Set terms.
     *
     * @param string $terms
     *
     * @return CampaignPublisher
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get terms.
     *
     * @return string
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set linkHash.
     *
     * @param string $linkHash
     *
     * @return CampaignPublisher
     */
    public function setLinkHash($linkHash)
    {
        $this->linkHash = $linkHash;

        return $this;
    }

    /**
     * Get linkHash.
     *
     * @return string
     */
    public function getLinkHash()
    {
        return $this->linkHash;
    }

    /**
     * Set visible.
     *
     * @param bool $visible
     *
     * @return CampaignPublisher
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
     * Set campaign.
     *
     * @param Campaign $campaign
     *
     * @return CampaignPublisher
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
     * Constructor.
     */
    public function __construct()
    {
        $this->leads = new ArrayCollection();
    }

    /**
     * Add lead.
     *
     * @param Lead $lead
     *
     * @return CampaignPublisher
     */
    public function addLead(Lead $lead)
    {
        $this->leads[] = $lead;

        return $this;
    }

    /**
     * Remove lead.
     *
     * @param Lead $lead
     */
    public function removeLead(Lead $lead)
    {
        $this->leads->removeElement($lead);
    }

    /**
     * Get leads.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeads()
    {
        return $this->leads;
    }

    /**
     * Add trackConversion.
     *
     * @param TrackConversion $trackConversion
     *
     * @return CampaignPublisher
     */
    public function addTrackConversion(TrackConversion $trackConversion)
    {
        $this->trackConversion[] = $trackConversion;

        return $this;
    }

    /**
     * Remove trackConversion.
     *
     * @param TrackConversion $trackConversion
     */
    public function removeTrackConversion(TrackConversion $trackConversion)
    {
        $this->trackConversion->removeElement($trackConversion);
    }

    /**
     * Get trackConversion.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrackConversion()
    {
        return $this->trackConversion;
    }

    /**
     * Set baseCurrencyPayout.
     *
     * @param string $baseCurrencyPayout
     *
     * @return CampaignPublisher
     */
    public function setBaseCurrencyPayout($baseCurrencyPayout)
    {
        $this->baseCurrencyPayout = $baseCurrencyPayout;

        return $this;
    }

    /**
     * Get baseCurrencyPayout.
     *
     * @return string
     */
    public function getBaseCurrencyPayout()
    {
        return $this->baseCurrencyPayout;
    }

    /**
     * Set current.
     *
     * @param bool $current
     *
     * @return CampaignPublisher
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get current.
     *
     * @return bool
     */
    public function getCurrent()
    {
        return $this->current;
    }
}
