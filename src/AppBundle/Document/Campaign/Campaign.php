<?php

namespace AppBundle\Document\Campaign;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Campaign.
 *
 * @ODM\Collection(name="Campaign")
 * @ODM\Document()
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 * @Gedmo\Loggable(logEntryClass="\AppBundle\Document\Campaign\CampaignLogEntry")
 */
class Campaign
{
    /**
     * @var string
     *
     * @ODM\Field(name="id", type="string")
     * @ODM\Id(strategy="UUID", type="string")
     */
    public $id;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="\AppBundle\Document\Campaign\CampaignLink", mappedBy="campaign", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="\AppBundle\Document\Campaign\CampaignLink")
     */
    public $campaignLinks;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Campaign\CampaignPublisher", mappedBy="campaign", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\Campaign\CampaignPublisher")
     */
    public $campaignPublishers;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackConversion", mappedBy="campaign", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\TrackConversion")
     */
    public $trackConversions;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Statistics\StatisticsCampaign", mappedBy="campaign", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\Statistics\StatisticsCampaign")
     */
    public $statisticsCampaigns;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Statistics\StatisticsCampaignChronology", mappedBy="campaign", cascade={"persist"})
     * @ODM\EmbedMany(targetDocument="AppBundle\Document\Statistics\StatisticsCampaignChronology")
     */
    public $statisticsCampaignChronologies;

    /**
     * @var string
     *
     * @ODM\Field(name="updatedTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    public $updatedTs;

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
     * @param  $updatedTs
     *
     * @return Campaign
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
}
