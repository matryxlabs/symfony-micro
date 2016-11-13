<?php

namespace AppBundle\Document\Campaign;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Campaign.
 *
 * @ODM\Collection(name="Campaign")
 * @ODM\Document
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 * @Gedmo\Loggable(logEntryClass="\AppBundle\Document\Campaign\CampaignLogEntry")
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
     * @ODM\ReferenceMany(targetEntity="\AppBundle\Document\Campaign\CampaignLink", mappedBy="campaign", cascade={"persist"})
     */
    private $campaignLinks;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\Campaign\CampaignPublisher", mappedBy="campaign", cascade={"persist"})
     */
    private $campaignPublishers;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\TrackConversion", mappedBy="campaign", cascade={"persist"})
     */
    private $trackConversions;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\Statistics\StatisticsCampaign", mappedBy="campaign", cascade={"persist"})
     */
    private $statisticsCampaigns;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\Statistics\StatisticsCampaignChronology", mappedBy="campaign", cascade={"persist"})
     */
    private $statisticsCampaignChronologies;

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
