<?php

namespace AppBundle\Document\Publisher;

use AppBundle\Document\Lead\Lead;
use AppBundle\Document\TrackClick;
use AppBundle\Document\TrackConversion;
use AppBundle\Document\TrackImpression;
use AppBundle\Document\Campaign\CampaignPublisher;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Publisher.
 *
 * @ODM\Collection(name="Publisher")
 * @ODM\Document()
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class Publisher
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
     * @ODM\Field(name="orgname", type="string")
     */
    public $orgname;

    /**
     * @var string
     *
     * @ODM\Field(name="orgurl", type="string")
     */
    public $orgurl;

    /**
     * @var string
     *
     * @ODM\Field(name="logo", type="string", nullable=true)
     */
    public $logo;

    /**
     * @var string
     *
     * @ODM\Field(name="taxclass", type="string", nullable=true)
     */
    public $taxclass;

    /**
     * @var int
     *
     * @ODM\Field(name="companyNumber", type="string", nullable=true)
     */
    public $companyNumber;

    /**
     * @var string
     *
     * @ODM\Field(name="notes", type="string", nullable=true)
     */
    public $notes;

    /**
     * @var string
     *
     * @ODM\Field(name="updatedTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    public $updatedTs;

    /**
     * @var bool
     *
     * @ODM\Field(name="visible", type="boolean")
     */
    public $visible;

    /**
     * @var string
     *
     * @ODM\Field(name="verified", type="string")
     */
    public $verified;

    /**
     * @var string
     *
     * @ODM\Field(name="source", type="string")
     */
    public $source;

    /**
     * @var string
     *
     * @ODM\Field(name="defaultSubId", type="string", nullable=true)
     */
    public $defaultSubId;

    /**
     * @var string
     *
     * @ODM\Field(name="defaultLeadTagType", type="string", nullable=true)
     */
    public $defaultLeadTagType;

    /**
     * @var string
     *
     * @ODM\Field(name="defaultLeadTag", type="string", nullable=true)
     */
    public $defaultLeadTag;

    /**
     * @var string
     *
     * @ODM\Field(name="signupToken", type="string", nullable=true)
     */
    public $signupToken;

    /**
     * @var
     *
     * @ODM\Field(name="oldPublisherId", type="integer", nullable=true)
     */
    public $oldPublisherId;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Lead\Lead", mappedBy="publisher", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\Lead\Lead")
     */
    public $leads;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Campaign\CampaignPublisher", mappedBy="publisher", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\Campaign\CampaignPublisher")
     */
    public $campaignPublishers;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackClick", mappedBy="publisher", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\TrackClick")
     */
    public $trackClicks;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackConversion", mappedBy="publisher", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\TrackConversion")
     */
    public $trackConversions;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackImpression", mappedBy="publisher", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\TrackImpression")
     */
    public $trackImpressions;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Statistics\StatisticsCampaignChronology", mappedBy="publisher", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\Statistics\StatisticsCampaignChronology")
     */
    public $statisticsCampaignChronologies;
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->leads = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->campaignTrafficSchedules = new ArrayCollection();
        $this->conversionTags = new ArrayCollection();
        $this->campaignPublisherApplications = new ArrayCollection();
        $this->campaignPublishers = new ArrayCollection();
        $this->campaignCreativeEmails = new ArrayCollection();
        $this->statisticsCampaignChronologies = new ArrayCollection();
        $this->trackClicks = new ArrayCollection();
        $this->trackConversions = new ArrayCollection();
        $this->trackImpressions = new ArrayCollection();
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
     * Set orgname.
     *
     * @param string $orgname
     *
     * @return Publisher
     */
    public function setOrgname($orgname)
    {
        $this->orgname = $orgname;

        return $this;
    }

    /**
     * Get orgname.
     *
     * @return string
     */
    public function getOrgname()
    {
        return $this->orgname;
    }

    /**
     * Set orgurl.
     *
     * @param string $orgurl
     *
     * @return Publisher
     */
    public function setOrgurl($orgurl)
    {
        $this->orgurl = $orgurl;

        return $this;
    }

    /**
     * Get orgurl.
     *
     * @return string
     */
    public function getOrgurl()
    {
        return $this->orgurl;
    }

    /**
     * Set logo.
     *
     * @param string $logo
     *
     * @return Publisher
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo.
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set taxclass.
     *
     * @param string $taxclass
     *
     * @return Publisher
     */
    public function setTaxclass($taxclass)
    {
        $this->taxclass = $taxclass;

        return $this;
    }

    /**
     * Get taxclass.
     *
     * @return string
     */
    public function getTaxclass()
    {
        return $this->taxclass;
    }

    /**
     * Set companyNumber.
     *
     * @param int $companyNumber
     *
     * @return Publisher
     */
    public function setCompanyNumber($companyNumber)
    {
        $this->companyNumber = $companyNumber;

        return $this;
    }

    /**
     * Get companyNumber.
     *
     * @return int
     */
    public function getCompanyNumber()
    {
        return $this->companyNumber;
    }

    /**
     * Set notes.
     *
     * @param string $notes
     *
     * @return Publisher
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set updatedTs.
     *
     * @param \Datetime $date
     *
     * @return Publisher
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
     * @return Publisher
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
     * Add leads.
     *
     * @param Lead $leads
     *
     * @return Publisher
     */
    public function addLead(Lead $leads)
    {
        $this->leads[] = $leads;

        return $this;
    }

    /**
     * Remove leads.
     *
     * @param Lead $leads
     */
    public function removeLead(Lead $leads)
    {
        $this->leads->removeElement($leads);
    }

    /**
     * Get leads.
     *
     * @return Collection
     */
    public function getLeads()
    {
        return $this->leads;
    }

    /**
     * Get conversionTags.
     *
     * @return Collection
     */
    public function getConversionTags()
    {
        return $this->conversionTags;
    }


    /**
     * Get campaignPublisherApplications.
     *
     * @return Collection
     */
    public function getCampaignPublisherApplications()
    {
        return $this->campaignPublisherApplications;
    }

    /**
     * Add campaignPublishers.
     *
     * @param CampaignPublisher $campaignPublishers
     *
     * @return Publisher
     */
    public function addCampaignPublisher(CampaignPublisher $campaignPublishers)
    {
        $this->campaignPublishers[] = $campaignPublishers;

        return $this;
    }

    /**
     * Remove campaignPublishers.
     *
     * @param CampaignPublisher $campaignPublishers
     */
    public function removeCampaignPublisher(CampaignPublisher $campaignPublishers)
    {
        $this->campaignPublishers->removeElement($campaignPublishers);
    }

    /**
     * Get campaignPublishers.
     *
     * @return Collection
     */
    public function getCampaignPublishers()
    {
        return $this->campaignPublishers;
    }

    /**
     * Get campaignCreativeEmails.
     *
     * @return Collection
     */
    public function getCampaignCreativeEmails()
    {
        return $this->campaignCreativeEmails;
    }
    
    /**
     * Get statisticsCampaignChronologies.
     *
     * @return Collection
     */
    public function getStatisticsCampaignChronologies()
    {
        return $this->statisticsCampaignChronologies;
    }

    /**
     * Add trackClicks.
     *
     * @param TrackClick $trackClicks
     *
     * @return Publisher
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
     * @return Collection
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
     * @return Publisher
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
     * @return Collection
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
     * @return Publisher
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
     * @return Collection
     */
    public function getTrackImpressions()
    {
        return $this->trackImpressions;
    }
    
    public function __toString()
    {
        return $this->orgname;
    }

    /**
     * Set verified.
     *
     * @param string $verified
     *
     * @return Publisher
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified.
     *
     * @return string
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set source.
     *
     * @param string $source
     *
     * @return Publisher
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set signupToken.
     *
     * @param string $signupToken
     *
     * @return Publisher
     */
    public function setSignupToken($signupToken)
    {
        $this->signupToken = $signupToken;

        return $this;
    }

    /**
     * Get signupToken.
     *
     * @return string
     */
    public function getSignupToken()
    {
        return $this->signupToken;
    }

    /**
     * Set oldPublisherId.
     *
     * @param int $oldPublisherId
     *
     * @return Publisher
     */
    public function setOldPublisherId($oldPublisherId)
    {
        $this->oldPublisherId = $oldPublisherId;

        return $this;
    }

    /**
     * Get oldPublisherId.
     *
     * @return int
     */
    public function getOldPublisherId()
    {
        return $this->oldPublisherId;
    }

    /**
     * Set defaultSubId.
     *
     * @param string $defaultSubId
     *
     * @return Publisher
     */
    public function setDefaultSubId($defaultSubId)
    {
        $this->defaultSubId = $defaultSubId;

        return $this;
    }

    /**
     * Get defaultSubId.
     *
     * @return string
     */
    public function getDefaultSubId()
    {
        return $this->defaultSubId;
    }

    /**
     * Set defaultLeadTag.
     *
     * @param string $defaultLeadTag
     *
     * @return Publisher
     */
    public function setDefaultLeadTag($defaultLeadTag)
    {
        $this->defaultLeadTag = $defaultLeadTag;

        return $this;
    }

    /**
     * Get defaultLeadTag.
     *
     * @return string
     */
    public function getDefaultLeadTag()
    {
        return $this->defaultLeadTag;
    }

    /**
     * Set defaultLeadTagType.
     *
     * @param string $defaultLeadTagType
     *
     * @return Publisher
     */
    public function setDefaultLeadTagType($defaultLeadTagType)
    {
        $this->defaultLeadTagType = $defaultLeadTagType;

        return $this;
    }

    /**
     * Get defaultLeadTagType.
     *
     * @return string
     */
    public function getDefaultLeadTagType()
    {
        return $this->defaultLeadTagType;
    }
}
