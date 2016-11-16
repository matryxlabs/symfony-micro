<?php

namespace AppBundle\Document\Statistics;

use AppBundle\Document\Campaign\Campaign;
use AppBundle\Document\Campaign\CampaignLink;
use AppBundle\Document\Publisher\Publisher;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * StatisticsCampaignChronology.
 *
 * @ODM\Collection(name="StatisticsCampaignChronology")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class StatisticsCampaignChronology
{
    /**
     * @var string
     *
     * @ODM\Field(name="id", type="string")
     * @ODM\Id(strategy="UUID", type="string")
     */
    public $id;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="reportTs", type="string")
     */
    public $reportTs;

    /**
     * @var int
     *
     * @ODM\Field(name="liveImpressions", type="integer")
     */
    public $liveImpressions = 0;

    /**
     * @var int
     *
     * @ODM\Field(name="liveClicks", type="integer")
     */
    public $liveClicks = 0;

    /**
     * @var int
     *
     * @ODM\Field(name="liveConversions", type="integer")
     */
    public $liveConversions = 0;

    /**
     * @var int
     *
     * @ODM\Field(name="testImpressions", type="integer")
     */
    public $testImpressions = 0;

    /**
     * @var int
     *
     * @ODM\Field(name="testClicks", type="integer")
     */
    public $testClicks = 0;

    /**
     * @var int
     *
     * @ODM\Field(name="testConversions", type="integer")
     */
    public $testConversions = 0;

    /**
     * @var int
     *
     * @ODM\Field(name="conversionsRequiredFromPublisher", type="integer", nullable=true)
     */
    public $conversionsRequiredFromPublisher;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="firstLiveImpression", type="string", nullable=true)
     */
    public $firstLiveImpression;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="firstLiveClick", type="string", nullable=true)
     */
    public $firstLiveClick;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="firstLiveConversion", type="string", nullable=true)
     */
    public $firstLiveConversion;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="lastLiveConversion", type="string", nullable=true)
     */
    public $lastLiveConversion;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="lastLiveImpression", type="string", nullable=true)
     */
    public $lastLiveImpression;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="lastLiveClick", type="string", nullable=true)
     */
    public $lastLiveClick;

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
     * @var Campaign
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\Campaign", inversedBy="statisticsCampaignChronologies")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\Campaign")
     */
    public $campaign;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Publisher\Publisher", inversedBy="statisticsCampaignChronologies")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Publisher\Publisher")
     */
    public $publisher;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\CampaignLink")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\CampaignLink")
     */
    public $link;

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
     * Set reportTs.
     *
     * @param \DateTime $reportTs
     *
     * @return StatisticsCampaignChronology
     */
    public function setReportTs($reportTs)
    {
        $this->reportTs = $reportTs;

        return $this;
    }

    /**
     * Get reportTs.
     *
     * @return \DateTime
     */
    public function getReportTs()
    {
        return $this->reportTs;
    }

    /**
     * Set liveImpressions.
     *
     * @param int $liveImpressions
     *
     * @return StatisticsCampaignChronology
     */
    public function setLiveImpressions($liveImpressions)
    {
        $this->liveImpressions = $liveImpressions;

        return $this;
    }

    /**
     * Get liveImpressions.
     *
     * @return int
     */
    public function getLiveImpressions()
    {
        return $this->liveImpressions;
    }

    /**
     * Set liveClicks.
     *
     * @param int $liveClicks
     *
     * @return StatisticsCampaignChronology
     */
    public function setLiveClicks($liveClicks)
    {
        $this->liveClicks = $liveClicks;

        return $this;
    }

    /**
     * Get liveClicks.
     *
     * @return int
     */
    public function getLiveClicks()
    {
        return $this->liveClicks;
    }

    /**
     * Set liveConversions.
     *
     * @param int $liveConversions
     *
     * @return StatisticsCampaignChronology
     */
    public function setLiveConversions($liveConversions)
    {
        $this->liveConversions = $liveConversions;

        return $this;
    }

    /**
     * Get liveConversions.
     *
     * @return int
     */
    public function getLiveConversions()
    {
        return $this->liveConversions;
    }

    /**
     * Set testImpressions.
     *
     * @param int $testImpressions
     *
     * @return StatisticsCampaignChronology
     */
    public function setTestImpressions($testImpressions)
    {
        $this->testImpressions = $testImpressions;

        return $this;
    }

    /**
     * Get testImpressions.
     *
     * @return int
     */
    public function getTestImpressions()
    {
        return $this->testImpressions;
    }

    /**
     * Set testClicks.
     *
     * @param int $testClicks
     *
     * @return StatisticsCampaignChronology
     */
    public function setTestClicks($testClicks)
    {
        $this->testClicks = $testClicks;

        return $this;
    }

    /**
     * Get testClicks.
     *
     * @return int
     */
    public function getTestClicks()
    {
        return $this->testClicks;
    }

    /**
     * Set testConversions.
     *
     * @param int $testConversions
     *
     * @return StatisticsCampaignChronology
     */
    public function setTestConversions($testConversions)
    {
        $this->testConversions = $testConversions;

        return $this;
    }

    /**
     * Get testConversions.
     *
     * @return int
     */
    public function getTestConversions()
    {
        return $this->testConversions;
    }

    /**
     * Set updatedTs.
     *
     * @param \Datetime $date
     *
     * @return StatisticsCampaignChronology
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
     * @return StatisticsCampaignChronology
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
     * @return StatisticsCampaignChronology
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
     * Set publisher.
     *
     * @param Publisher $publisher
     *
     * @return StatisticsCampaignChronology
     */
    public function setPublisher(Publisher $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher.
     *
     * @return Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set link.
     *
     * @param CampaignLink $link
     *
     * @return StatisticsCampaignChronology
     */
    public function setLink(CampaignLink $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link.
     *
     * @return CampaignLink
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set conversionsRequiredFromPublisher.
     *
     * @param int $conversionsRequiredFromPublisher
     *
     * @return StatisticsCampaignChronology
     */
    public function setConversionsRequiredFromPublisher($conversionsRequiredFromPublisher)
    {
        $this->conversionsRequiredFromPublisher = $conversionsRequiredFromPublisher;

        return $this;
    }

    /**
     * Get conversionsRequiredFromPublisher.
     *
     * @return int
     */
    public function getConversionsRequiredFromPublisher()
    {
        return $this->conversionsRequiredFromPublisher;
    }

    /**
     * Set firstLiveImpression.
     *
     * @param \DateTime $firstLiveImpression
     *
     * @return StatisticsCampaignChronology
     */
    public function setFirstLiveImpression($firstLiveImpression)
    {
        $this->firstLiveImpression = $firstLiveImpression;

        return $this;
    }

    /**
     * Get firstLiveImpression.
     *
     * @return \DateTime
     */
    public function getFirstLiveImpression()
    {
        return $this->firstLiveImpression;
    }

    /**
     * Set firstLiveClick.
     *
     * @param \DateTime $firstLiveClick
     *
     * @return StatisticsCampaignChronology
     */
    public function setFirstLiveClick($firstLiveClick)
    {
        $this->firstLiveClick = $firstLiveClick;

        return $this;
    }

    /**
     * Get firstLiveClick.
     *
     * @return \DateTime
     */
    public function getFirstLiveClick()
    {
        return $this->firstLiveClick;
    }

    /**
     * Set firstLiveConversion.
     *
     * @param \DateTime $firstLiveConversion
     *
     * @return StatisticsCampaignChronology
     */
    public function setFirstLiveConversion($firstLiveConversion)
    {
        $this->firstLiveConversion = $firstLiveConversion;

        return $this;
    }

    /**
     * Get firstLiveConversion.
     *
     * @return \DateTime
     */
    public function getFirstLiveConversion()
    {
        return $this->firstLiveConversion;
    }

    /**
     * Set lastLiveConversion.
     *
     * @param \DateTime $lastLiveConversion
     *
     * @return StatisticsCampaignChronology
     */
    public function setLastLiveConversion($lastLiveConversion)
    {
        $this->lastLiveConversion = $lastLiveConversion;

        return $this;
    }

    /**
     * Get lastLiveConversion.
     *
     * @return \DateTime
     */
    public function getLastLiveConversion()
    {
        return $this->lastLiveConversion;
    }

    /**
     * Set lastLiveImpression.
     *
     * @param \DateTime $lastLiveImpression
     *
     * @return StatisticsCampaignChronology
     */
    public function setLastLiveImpression($lastLiveImpression)
    {
        $this->lastLiveImpression = $lastLiveImpression;

        return $this;
    }

    /**
     * Get lastLiveImpression.
     *
     * @return \DateTime
     */
    public function getLastLiveImpression()
    {
        return $this->lastLiveImpression;
    }

    /**
     * Set lastLiveClick.
     *
     * @param \DateTime $lastLiveClick
     *
     * @return StatisticsCampaignChronology
     */
    public function setLastLiveClick($lastLiveClick)
    {
        $this->lastLiveClick = $lastLiveClick;

        return $this;
    }

    /**
     * Get lastLiveClick.
     *
     * @return \DateTime
     */
    public function getLastLiveClick()
    {
        return $this->lastLiveClick;
    }
}
