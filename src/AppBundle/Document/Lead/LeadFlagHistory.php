<?php

namespace AppBundle\Document\Lead;

use AppBundle\Document\TrackConversion;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * LeadFlagHistory.
 *
 * @ODM\Collection(name="LeadFlagHistory")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class LeadFlagHistory
{
    /**
     * @var int
     *
     * @ODM\Field(name="id", type="integer")
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    public $id;

    /**
     * @var string
     *
     * @ODM\Field(name="reason", type="string")
     */
    public $reason;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="createdTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    public $createdTs;

    /**
     * @var LeadFlag
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Lead\LeadFlag")
     */
    public $leadFlag;
    
    /**
     * @var Lead
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Lead\Lead", inversedBy="leadFlagHistory")
     */
    public $lead;

    /**
     * @var Lead
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\TrackConversion", inversedBy="leadFlagHistory")
     */
    public $trackConversion;

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
     * Set reason.
     *
     * @param string $reason
     *
     * @return LeadFlagHistory
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason.
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set createdTs.
     *
     * @param \DateTime $createdTs
     *
     * @return LeadFlagHistory
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
     * Set leadFlag.
     *
     * @param LeadFlag $leadFlag
     *
     * @return LeadFlagHistory
     */
    public function setLeadFlag(LeadFlag $leadFlag = null)
    {
        $this->leadFlag = $leadFlag;

        return $this;
    }

    /**
     * Get leadFlag.
     *
     * @return LeadFlag
     */
    public function getLeadFlag()
    {
        return $this->leadFlag;
    }

    /**
     * Set lead.
     *
     * @param Lead $lead
     *
     * @return LeadFlagHistory
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
     * Set trackConversion.
     *
     * @param TrackConversion $trackConversion
     *
     * @return LeadFlagHistory
     */
    public function setTrackConversion(TrackConversion $trackConversion = null)
    {
        $this->trackConversion = $trackConversion;

        return $this;
    }

    /**
     * Get trackConversion.
     *
     * @return Lead
     */
    public function getTrackConversion()
    {
        return $this->trackConversion;
    }
}
