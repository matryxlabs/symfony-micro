<?php

namespace AppBundle\Controller;

//use Convertr\CoreBundle\Event\CacheEvent;
//use Convertr\SharedBundle\Event\ErrorEvent;
use AppBundle\Service\StatsService;
use AppBundle\Service\TrackServiceMongo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;
/**
 * Track the impression based on link id and publisher id, return a 1x1 pixel.
 *
 * Class ImpressionTrackingController
 */

class ImpressionTrackingMongoController extends Controller
{
    /**
     * @Route("/mongotrackme")
     *
     * Check the parameter's validity, update stats, return pixel.
     *
     * @param Request $request
     * @return Response
     */

    public function trackAction(Request $request)
    {
        // Check that the parameters are present
        $linkId = $request->get('l', $request->get('lid'));
        $publisherId = $request->get('p', $request->get('pid'));
        $documentManager= $this->get('doctrine_mongodb')->getManager();
        $client = new Client();
        $trackService = new TrackServiceMongo($documentManager, $client);

        if (!$linkId || !$publisherId) {
            return $this->render('AppBundle:Default:index.html.twig', [
                'message' => 'Publisher or Link not exists',
                'pixel' => $trackService->get1PxGifResponse(),
            ]);
            return $trackService->get1PxGifResponse();
        }

        $publisherImpression = $trackService->getCampaignFromTrackArgs($publisherId, $linkId);
        if ($publisherImpression == false) {
            //$this->get('convertr.log.track')->info('Publisher or Link not valid for this campaign');
            return $this->render('AppBundle:Default:index.html.twig', [
                'message' => 'Publisher or Link not valid for this campaign',
                'pixel' => $trackService->get1PxGifResponse(),
            ]);
        }
        $campaignId = $publisherImpression['campaignId'];

        // We have validated the inputs - now we save the tracking data
        $trackService->addImpression($request, $publisherId, $linkId);
//        // Update campaign stats for adv, pub and chronology
//        exit;
//        $campaignStats = new StatsService($documentManager);
//        $campaignStats->updateTracking($campaignId, $publisherId, 1, 0, 0, $linkId, false);

        //return $trackService->get1PxGifResponse();
        return $this->render('AppBundle:Default:index.html.twig', [
            'message' => 'Valid impression!',
            'pixel' => $trackService->get1PxGifResponse(),
        ]);
    }
}
