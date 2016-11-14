<?php

namespace AppBundle\Entity\Campaign;

use AppBundle\Entity\Lead\Lead;
use AppBundle\Entity\Publisher\Publisher;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CampaignPublisher.
 *
 * @ORM\Table(name="CampaignPublisher")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class CampaignPublisher
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
     * @ORM\Column(name="baseCurrencyPayout", type="decimal", scale=2)
     * @Gedmo\Versioned
     */
    private $baseCurrencyPayout;

    /**
     * @var string
     *
     * @ORM\Column(name="payout", type="decimal", scale=2)
     * @Gedmo\Versioned
     */
    private $payout;

    /**
     * @var int
     *
     * @ORM\Column(name="leadsRequired", type="integer")
     * @Gedmo\Versioned
     */
    private $leadsRequired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startTs", type="datetime")
     */
    private $startTs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTs", type="datetime", nullable=true)
     */
    private $endTs;

    /**
     * @var string
     *
     * @ORM\Column(name="signName", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $signName;

    /**
     * @var string
     *
     * @ORM\Column(name="signRole", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $signRole;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="signedTs", type="datetime", nullable=true)
     * @Gedmo\Versioned
     */
    private $signedTs;

    /**
     * @var string
     *
     * @ORM\Column(name="signedIp", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $signedIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedTs", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedTs;

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
     * @ORM\Column(name="terms", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $terms;

    /**
     * @var string
     *
     * @ORM\Column(name="linkHash", type="string", length=255)
     */
    private $linkHash;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;

    /**
     * @var string
     *
     * @ORM\Column(name="current", type="boolean")
     */
    private $current = false;

    /**
     * @var Campaign
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Campaign\Campaign", inversedBy="campaignPublishers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignId", referencedColumnName="id")
     * })
     */
    private $campaign;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lead\Lead", mappedBy="campaignPublisher", cascade={"persist"})
     */
    private $leads;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TrackConversion", mappedBy="campaignPublisher", cascade={"persist"})
     */
    private $trackConversion;

    /**
     * @var Publisher
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Publisher\Publisher", inversedBy="campaignPublishers", cascade="persist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publisherId", referencedColumnName="id")
     * })
     */
    private $publisher;

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
        $this->startTs = $startTs;

        return $this;
    }

    /**
     * Get startTs.
     *
     * @return \DateTime
     */
    public function getStartTs()
    {
        return $this->startTs;
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
        $this->endTs = $endTs;

        return $this;
    }

    /**
     * Get endTs.
     *
     * @return \DateTime
     */
    public function getEndTs()
    {
        return $this->endTs;
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
        $this->signedTs = $signedTs;

        return $this;
    }

    /**
     * Get signedTs.
     *
     * @return \DateTime
     */
    public function getSignedTs()
    {
        return $this->signedTs;
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
        $this->updatedTs = $date;

        return $this;
    }

    /**
     * Get updatedTs.
     *
     * @return \DateTime
     */
    public function getUpdatedTs()
    {
        return $this->updatedTs;
    }

    /**
     * Set createdTs.
     *
     * @ORM\PrePersist
     *
     * @return CampaignPublisher
     */
    public function setCreatedTs()
    {
        $this->createdTs = new \DateTime();

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
