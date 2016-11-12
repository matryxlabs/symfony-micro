<?php

namespace AppBundle\Entity\Campaign;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Campaign.
 *
 * @ORM\Table(name="Campaign")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 * @Gedmo\Loggable(logEntryClass="\AppBundle\Entity\Campaign\CampaignLogEntry")
 */
class Campaign
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
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Campaign\CampaignLink", mappedBy="campaign", cascade={"persist"})
     */
    private $campaignLinks;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Campaign\CampaignPublisher", mappedBy="campaign", cascade={"persist"})
     */
    private $campaignPublishers;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TrackConversion", mappedBy="campaign", cascade={"persist"})
     */
    private $trackConversions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedTs", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedTs;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Collection
     */
    public function getCampaignLinks()
    {
        return $this->campaignLinks;
    }

    /**
     * @param Collection $campaignLinks
     */
    public function setCampaignLinks($campaignLinks)
    {
        $this->campaignLinks = $campaignLinks;
    }
    /**
     * Set updatedTs.
     *
     * @param \Datetime $date
     *
     * @return Campaign
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
}
