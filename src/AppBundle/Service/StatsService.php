<?php

namespace AppBundle\Service;

use AppBundle\Entity\Campaign\CampaignLink;
use Doctrine\ORM\EntityManager;

class StatsService
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    /**
     * @param $campaignId
     * @param null $publisherId
     * @param int $newImpressions
     * @param int $newClicks
     * @param int $newConversions
     * @param null $linkId
     * @param bool $isTest
     */
    public function updateCampaignChronologyStats($campaignId, $publisherId = null, $newImpressions = 0, $newClicks = 0, $newConversions = 0, $linkId = null, $isTest = false)
    {
        $fromDate = new \DateTime();
        $fromDate->setTime(0, 0, 0);

        $toDate = new \DateTime();
        $toDate->setTime(0, 0, 0)->modify('+1 day');

        // Today date
        $now = new \DateTime();

        $connection = $this->entityManager->getConnection();

        $sql = 'SELECT
                    *
                FROM StatisticsCampaignChronology
                WHERE
                    publisherId = :publisherId
                    AND reportTs >= :fromDate
                    AND reportTs < :toDate
                    AND campaignId = :campaignId
                    AND linkId = :linkId;';
        $statisticsCampaignChronology = $connection->fetchAssoc($sql, ['publisherId' => $publisherId, 'fromDate' => $fromDate->format('Y-m-d H:i:s'), 'toDate' => $toDate->format('Y-m-d H:i:s'), 'campaignId' => $campaignId, 'linkId' => $linkId]);

        /*
         * If we don't have a stat for that publisher / cmapaign (statisticsCampaignChronology == false)
         * the clicks are setted to 0 otherwise we take their last value
         */
        $isNew = $statisticsCampaignChronology == false;
        $statisticsCampaignChronology['testClicks'] = ($statisticsCampaignChronology != false && !empty($statisticsCampaignChronology['testClicks'])) ? $statisticsCampaignChronology['testClicks'] : 0;
        $statisticsCampaignChronology['liveClicks'] = ($statisticsCampaignChronology != false && !empty($statisticsCampaignChronology['liveClicks'])) ? $statisticsCampaignChronology['liveClicks'] : 0;
        $statisticsCampaignChronology['testImpressions'] = ($statisticsCampaignChronology != false && !empty($statisticsCampaignChronology['testImpressions'])) ? $statisticsCampaignChronology['testImpressions'] : 0;
        $statisticsCampaignChronology['liveImpressions'] = ($statisticsCampaignChronology != false && !empty($statisticsCampaignChronology['liveImpressions'])) ? $statisticsCampaignChronology['liveImpressions'] : 0;
        $statisticsCampaignChronology['testConversions'] = ($statisticsCampaignChronology != false && !empty($statisticsCampaignChronology['testConversions'])) ? $statisticsCampaignChronology['testConversions'] : 0;
        $statisticsCampaignChronology['liveConversions'] = ($statisticsCampaignChronology != false && !empty($statisticsCampaignChronology['liveConversions'])) ? $statisticsCampaignChronology['liveConversions'] : 0;

        // Select if we are test or live
        $insertType = ($isTest == true) ? 'test' : 'live';

        $updateFirstImpression = false;
        $updateFirstClick = false;
        $updateFirstConversion = false;

        if ($newImpressions) {
            $statisticsCampaignChronology['lastLiveImpression'] = $now->format('Y-m-d H:i:s');
            if (empty($statisticsCampaignChronology['firstLiveImpression'])) {
                $statisticsCampaignChronology['firstLiveImpression'] = $now->format('Y-m-d H:i:s');
                $updateFirstImpression = true;
            }
            $statisticsCampaignChronology[$insertType.'Impressions'] = $statisticsCampaignChronology[$insertType.'Impressions'] + 1;
        }
        if ($newClicks) {
            $statisticsCampaignChronology['lastLiveClick'] = $now->format('Y-m-d H:i:s');
            if (empty($statisticsCampaignChronology['firstLiveClick'])) {
                $statisticsCampaignChronology['firstLiveClick'] = $now->format('Y-m-d H:i:s');
                $updateFirstClick = true;
            }
            $statisticsCampaignChronology[$insertType.'Clicks'] = $statisticsCampaignChronology[$insertType.'Clicks'] + 1;
        }
        if ($newConversions) {
            $statisticsCampaignChronology['lastLiveConversion'] = $now->format('Y-m-d H:i:s');
            if (empty($statisticsCampaignChronology['firstLiveConversion'])) {
                $statisticsCampaignChronology['firstLiveConversion'] = $now->format('Y-m-d H:i:s');
                $updateFirstConversion = true;
            }
            $statisticsCampaignChronology[$insertType.'Conversions'] = $statisticsCampaignChronology[$insertType.'Conversions'] + 1;
        }

        if ($isNew) {
            // Insert
            $statisticsCampaignChronology['linkId'] = $linkId;
            $statisticsCampaignChronology['visible'] = 1;
            $statisticsCampaignChronology['reportTs'] = $now->format('Y-m-d H:i:s');
            $statisticsCampaignChronology['updatedTs'] = $now->format('Y-m-d H:i:s');
            $statisticsCampaignChronology['campaignId'] = $campaignId;
            $statisticsCampaignChronology['publisherId'] = $publisherId;

            if ($publisherId && $campaignId) {
                /* Grab the lead required for that publisher in that campaign */
                $getLeadsRequiredSql = 'SELECT leadsRequired FROM CampaignPublisher WHERE campaignId = :campaignId AND publisherId = :publisherId AND visible = 1';
                $leadRequired = $connection->fetchAssoc($getLeadsRequiredSql, ['campaignId' => $campaignId, 'publisherId' => $publisherId]);
                $statisticsCampaignChronology['conversionsRequiredFromPublisher'] = $leadRequired['leadsRequired'];
            }
            $connection->insert('StatisticsCampaignChronology', $statisticsCampaignChronology);
        } else {
            // Update
            $addUpdate = [];

            if ($newImpressions) {
                $addUpdate[] = $insertType."Impressions = {$insertType}Impressions + 1";
                if ($insertType == 'live') {
                    $addUpdate[] = "lastLiveImpression = '{$statisticsCampaignChronology['lastLiveImpression']}'";
                    if ($updateFirstImpression) {
                        $addUpdate[] = "firstLiveImpression = '{$statisticsCampaignChronology['firstLiveImpression']}'";
                    }
                }
            }
            if ($newClicks) {
                $addUpdate[] = $insertType."Clicks = {$insertType}Clicks + 1";
                if ($insertType == 'live') {
                    $addUpdate[] = "lastLiveClick = '{$statisticsCampaignChronology['lastLiveClick']}'";
                    if ($updateFirstClick) {
                        $addUpdate[] = "firstLiveClick = '{$statisticsCampaignChronology['firstLiveClick']}'";
                    }
                }
            }
            if ($newConversions) {
                $addUpdate[] = $insertType."Conversions = {$insertType}Conversions + 1";
                if ($insertType == 'live') {
                    $addUpdate[] = "lastLiveConversion = '{$statisticsCampaignChronology['lastLiveConversion']}'";

                    if ($updateFirstConversion) {
                        $addUpdate[] = "firstLiveConversion = '{$statisticsCampaignChronology['firstLiveConversion']}'";
                    }
                }
            }

            $addUpdate = implode(', ', $addUpdate);

            $query = "UPDATE StatisticsCampaignChronology
                      SET {$addUpdate},
                       updatedTs = '{$now->format('Y-m-d H:i:s')}'
                       WHERE id = {$statisticsCampaignChronology['id']}";

            $connection->executeQuery($query);
        }
    }

    /**
     * Update stats_ tables for reporting on tracking stages.
     * This func will be called upon impression, click and conv.
     * and will provide realtime stats on camp and pub performance.
     *
     * @param int          $campaignId
     * @param int          $publisherId
     * @param int          $newImpressions
     * @param int          $newClicks
     * @param int          $newConversions
     * @param CampaignLink $link
     * @param bool         $isTest
     */
    public function updateTracking($campaignId, $publisherId, $newImpressions, $newClicks, $newConversions, $link, $isTest = false)
    {
            $this->updateCampaignChronologyStats($campaignId, $publisherId, $newImpressions, $newClicks, $newConversions, $link, $isTest);
    }
}
