<?php

namespace AppBundle\Controller;

//use Convertr\CoreBundle\Event\CacheEvent;
//use Convertr\SharedBundle\Event\ErrorEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Service\TrackService;
use GuzzleHttp\Client;
/**
 * Track the impression based on link id and publisher id, return a 1x1 pixel.
 *
 * Class ImpressionTrackingController
 */

class ImpressionTrackingController extends BaseController
{
    /**
     * @Route("/")
     *
     * Check the parameter's validity, update stats, return pixel.
     *
     * @param Request $request
     * @return Response
     */

    public function trackAction(Request $request)
    {
        // Check that the parameters are present
        $linkId = (int) $request->get('l', $request->get('lid'));
        $publisherId = (int) $request->get('p', $request->get('pid'));

        $trackService = new TrackService(EntityManager::class, Client::class);

        if (!$linkId || !$publisherId) {
            return $trackService->get1PxGifResponse();
        }

        $publisherImpression = $trackService->getCampaignFromTrackArgs($publisherId, $linkId);
//        if ($publisherImpression == false) {
//            $this->get('convertr.log.track')->info('Publisher or Link not valid for this campaign');
//
//            return $trackService->get1PxGifResponse();
//        }
//        $campaignId = $publisherImpression['campaignId'];
//
//        // We have validated the inputs - now we save the tracking data
//        $trackService->addImpression($request, $publisherId, $linkId);
//
//        // Update campaign stats for adv, pub and chronology
//        try {
//            $this->get('convertr_core.campaign.stats')->updateTracking($campaignId, $publisherId, 1, 0, 0, $linkId, false);
//            $this->get('event_dispatcher')->dispatch('event.tracking.impression', new CacheEvent($campaignId));
//        } catch (\Exception $e) {
//            $this->get('event_dispatcher')->dispatch(
//                'event.platform.error',
//                new ErrorEvent($this->get('instance_meta_data')->getHostname(), $e->getMessage(), ErrorEvent::TYPE_ERROR, $campaignId)
//            );
//        }

        return $trackService->get1PxGifResponse();
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
        try {
            $this->updateCampaignChronologyStats($campaignId, $publisherId, $newImpressions, $newClicks, $newConversions, $link, $isTest);
        } catch (\Exception $e) {
            $this->dispatcher->dispatch(
                'event.platform.error',
                new ErrorEvent($this->enterpriseName, $e->getMessage(), ErrorEvent::TYPE_ERROR, $campaignId)
            );
        }
    }


}
