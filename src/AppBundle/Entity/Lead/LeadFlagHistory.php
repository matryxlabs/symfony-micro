<?php

namespace AppBundle\Entity\Lead;

use AppBundle\Entity\TrackConversion;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * LeadFlagHistory.
 *
 * @ORM\Table(name="LeadFlagHistory")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class LeadFlagHistory
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
     * @ORM\Column(name="reason", type="string", length=255)
     */
    private $reason;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdTs", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdTs;

    /**
     * @var LeadFlag
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lead\LeadFlag")
     */
    private $leadFlag;
    
    /**
     * @var Lead
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lead\Lead", inversedBy="leadFlagHistory")
     */
    private $lead;

    /**
     * @var Lead
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TrackConversion", inversedBy="leadFlagHistory")
     */
    private $trackConversion;

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
