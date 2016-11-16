<?php

namespace AppBundle\Document\Statistics;

use AppBundle\Document\Campaign\Campaign;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * StatisticsCampaign.
 *
 * @ODM\Collection(name="StatisticsCampaign")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 */
class StatisticsCampaign
{
    /**
     * @var string
     *
     * @ODM\Field(name="id", type="string")
     * @ODM\Id(strategy="UUID", type="string")
     */
    public $id;

    /**
     * @var int
     *
     * @ODM\Field(name="liveImpressions", type="integer")
     */
    public $liveImpressions;

    /**
     * @var int
     *
     * @ODM\Field(name="liveClicks", type="integer")
     */
    public $liveClicks;

    /**
     * @var int
     *
     * @ODM\Field(name="liveConversions", type="integer")
     */
    public $liveConversions;

    /**
     * @var int
     *
     * @ODM\Field(name="testImpressions", type="integer")
     */
    public $testImpressions;

    /**
     * @var int
     *
     * @ODM\Field(name="testClicks", type="integer")
     */
    public $testClicks;

    /**
     * @var int
     *
     * @ODM\Field(name="testConversions", type="integer")
     */
    public $testConversions;

    /**
     * @var int
     *
     * @ODM\Field(name="conversionsRequired", type="integer")
     */
    public $conversionsRequired;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="firstLiveImpression", type="string")
     */
    public $firstLiveImpression;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="firstLiveClick", type="string")
     */
    public $firstLiveClick;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="firstLiveConversion", type="string")
     */
    public $firstLiveConversion;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="lastLiveConversion", type="string")
     */
    public $lastLiveConversion;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="lastLiveImpression", type="string")
     */
    public $lastLiveImpression;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="lastLiveClick", type="string")
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
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\Campaign", inversedBy="statisticsCampaigns")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Campaign\Campaign")
     */
    public $campaign;

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
     * Set liveImpressions.
     *
     * @param int $liveImpressions
     *
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * Set conversionsRequired.
     *
     * @param int $conversionsRequired
     *
     * @return StatisticsCampaign
     */
    public function setConversionsRequired($conversionsRequired)
    {
        $this->conversionsRequired = $conversionsRequired;

        return $this;
    }

    /**
     * Get conversionsRequired.
     *
     * @return int
     */
    public function getConversionsRequired()
    {
        return $this->conversionsRequired;
    }

    /**
     * Set firstLiveImpression.
     *
     * @param \DateTime $firstLiveImpression
     *
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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

    /**
     * Set updatedTs.
     *
     * @param \Datetime $date
     *
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
     * @return StatisticsCampaign
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
}
