<?php

namespace AppBundle\Entity\Campaign;

use AppBundle\Entity\Channel;
use AppBundle\Entity\Lead\Lead;
use AppBundle\Entity\TrackImpression;
use AppBundle\Entity\TrackConversion;
use AppBundle\Entity\TrackClick;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CampaignLink.
 *
 * @ORM\Table(name="CampaignLink")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class CampaignLink
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="text")
     * @Gedmo\Versioned
     */
    private $destination;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     * @Gedmo\Versioned
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="placeholder", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $placeholder;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Channel")
     * @Gedmo\Versioned
     */
    private $channel;

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
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="showOnWebsite", type="boolean")
     */
    private $showOnWebsite = 0;

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
     * @Gedmo\Versioned
     */
    private $visible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TrackClick", mappedBy="campaignLink", cascade={"persist"})
     */
    private $trackClicks;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TrackConversion", mappedBy="campaignLink", cascade={"persist"})
     */
    private $trackConversions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TrackImpression", mappedBy="campaignLink", cascade={"persist"})
     */
    private $trackImpressions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lead\Lead", mappedBy="campaignLink", cascade={"persist"})
     */
    private $leads;

    /**
     * @var Campaign
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Campaign\Campaign", inversedBy="campaignLinks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignId", referencedColumnName="id", nullable=true)
     * })
     */
    private $campaign;
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->trackClicks = new ArrayCollection();
        $this->trackConversions = new ArrayCollection();
        $this->trackImpressions = new ArrayCollection();
        $this->leads = new ArrayCollection();
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
     * Set name.
     *
     * @param string $name
     *
     * @return CampaignLink
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set destination.
     *
     * @param string $destination
     *
     * @return CampaignLink
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set enabled.
     *
     * @param bool $enabled
     *
     * @return CampaignLink
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set placeholder.
     *
     * @param string $placeholder
     *
     * @return CampaignLink
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get placeholder.
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * Set channel.
     *
     * @param Channel $channel
     *
     * @return CampaignLink
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
     * Set createdTs.
     *
     * @ORM\PrePersist
     *
     * @return CampaignLink
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
     * Set description.
     *
     * @param string $description
     *
     * @return CampaignLink
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set updatedTs.
     *
     * @param \Datetime $date
     *
     * @return CampaignLink
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
     * Set visible.
     *
     * @param bool $visible
     *
     * @return CampaignLink
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
     * Add trackClicks.
     *
     * @param TrackClick $trackClicks
     *
     * @return CampaignLink
     */
    public function addTrackClick(TrackClick $trackClicks)
    {
        $this->trackClicks[] = $trackClicks;

        return $this;
    }

    /**
     * Remove trackClicks.
     *
     * @param TrackClick $trackClicks
     */
    public function removeTrackClick(TrackClick $trackClicks)
    {
        $this->trackClicks->removeElement($trackClicks);
    }

    /**
     * Get trackClicks.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrackClicks()
    {
        return $this->trackClicks;
    }

    /**
     * Add trackConversions.
     *
     * @param TrackConversion $trackConversions
     *
     * @return CampaignLink
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
     * Add trackImpressions.
     *
     * @param TrackImpression $trackImpressions
     *
     * @return CampaignLink
     */
    public function addTrackImpression(TrackImpression $trackImpressions)
    {
        $this->trackImpressions[] = $trackImpressions;

        return $this;
    }

    /**
     * Remove trackImpressions.
     *
     * @param TrackImpression $trackImpressions
     */
    public function removeTrackImpression(TrackImpression $trackImpressions)
    {
        $this->trackImpressions->removeElement($trackImpressions);
    }

    /**
     * Get trackImpressions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrackImpressions()
    {
        return $this->trackImpressions;
    }

    /**
     * Add leads.
     *
     * @param Lead $leads
     *
     * @return CampaignLink
     */
    public function addLead(Lead $leads)
    {
        $this->leads[] = $leads;

        return $this;
    }

    /**
     * Remove leads.
     *
     * @param 'AppBundle\Entity\Lead\Lead $leads
     */
    public function removeLead(Lead $leads)
    {
        $this->leads->removeElement($leads);
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
     * Set campaign.
     *
     * @param Campaign $campaign
     *
     * @return CampaignLink
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

    public function __toString()
    {
        return $this->getName().' ('.$this->getChannel().')';
    }

    /**
     * Set showOnWebsite.
     *
     * @param bool $showOnWebsite
     *
     * @return CampaignLink
     */
    public function setShowOnWebsite($showOnWebsite)
    {
        $this->showOnWebsite = $showOnWebsite;

        return $this;
    }

    /**
     * Get showOnWebsite.
     *
     * @return bool
     */
    public function getShowOnWebsite()
    {
        return $this->showOnWebsite;
    }

    /**
     * Get campaign Id for loggable.
     *
     * @return Campaign
     */
    public function getLoggableParent()
    {
        return $this->getCampaign();
    }

}
