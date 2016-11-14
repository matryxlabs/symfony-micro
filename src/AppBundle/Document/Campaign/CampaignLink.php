<?php

namespace AppBundle\Document\Campaign;

use AppBundle\Document\Channel;
use AppBundle\Document\Lead\Lead;
use AppBundle\Document\TrackImpression;
use AppBundle\Document\TrackConversion;
use AppBundle\Document\TrackClick;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CampaignLink.
 *
 * @ODM\Collection(name="CampaignLink")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY") */
class CampaignLink
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
     * @ODM\Field(name="name", type="string")
     * @Gedmo\Versioned
     */
    private $name;

    /**
     * @var string
     *
     * @ODM\Field(name="destination", type="string")
     * @Gedmo\Versioned
     */
    private $destination;

    /**
     * @var bool
     *
     * @ODM\Field(name="enabled", type="boolean")
     * @Gedmo\Versioned
     */
    private $enabled;

    /**
     * @var string
     *
     * @ODM\Field(name="placeholder", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $placeholder;

    /**
     * @var string
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Channel")
     * @Gedmo\Versioned
     */
    private $channel;

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
     * @ODM\Field(name="description", type="string", nullable=true)
     * @Gedmo\Versioned
     */
    private $description;

    /**
     * @var string
     *
     * @ODM\Field(name="showOnWebsite", type="boolean")
     */
    private $showOnWebsite = 0;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="updatedTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedTs;

    /**setUpdatedTs
     * @var bool
     *
     * @ODM\Field(name="visible", type="boolean")
     * @Gedmo\Versioned
     */
    private $visible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackClick", mappedBy="campaignLink", cascade={"persist"})
     */
    private $trackClicks;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackConversion", mappedBy="campaignLink", cascade={"persist"})
     */
    private $trackConversions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackImpression", mappedBy="campaignLink", cascade={"persist"})
     */
    private $trackImpressions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Lead\Lead", mappedBy="campaignLink", cascade={"persist"})
     */
    private $leads;

    /**
     * @var Campaign
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\Campaign", inversedBy="campaignLinks")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\Campaign")
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
     * @ODM\PrePersist
     *
     * @return CampaignLink
     */
    public function setCreatedTs()
    {
        $this->updatedTs =json_encode(new \DateTime());

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
     * @param \DateTime $updatedTs
     *
     * @return CampaignLink
     */
    public function setUpdatedTs(\DateTime $updatedTs)
    {
        $this->updatedTs =json_encode($updatedTs);

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
     * @param 'AppBundle\Document\Lead\Lead $leads
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
