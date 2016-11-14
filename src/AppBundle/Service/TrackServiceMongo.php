<?php

namespace AppBundle\Service;

use AppBundle\Document\TrackImpression;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class TrackServiceMongo
{
    protected $dm;
    protected $client;

    public function __construct(DocumentManager $documentManager, Client $client){
        $this->dm = $documentManager;
        $this->client = $client;
    }

    /**
     * Return 1x1 gif.
     *
     * @return Response
     */
    public function get1PxGifResponse()
    {
        $headers = array(
            'Content-Control' => 'no-cache',
            'Content-Type' => 'image/gif',
            'Content-Length' => '43',
        );

        return new Response(base64_decode('R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=='), 200, $headers);
    }
    /**
     * @param $publisherId
     * @param $linkId
     *
     * @return mixed
     */
    public function getCampaignFromTrackArgs($publisherId, $linkId)
    {
        $cacheHash = 'trackImpression:'.$linkId;
        $cacheKey = $publisherId;

        $dm = $this->dm;
        $campaignPublisherRepository = $dm->getRepository('AppBundle\Document\Campaign\CampaignPublisher');
        $campaignLinkRepository = $dm->getRepository('AppBundle\Document\Campaign\CampaignLink');

        $campaignPublisher = $campaignPublisherRepository->createQueryBuilder()
            ->field('publisher._id')
            ->equals($publisherId)
            ->getQuery()
            ->getSingleResult();

        if(is_null($campaignPublisher))
            return json_decode(null, 1);

        $campaignId = $campaignPublisher->getCampaign()->getId();

        $campaignLink = $campaignLinkRepository->createQueryBuilder()
            ->field('campaign._id')->equals($campaignId)
            ->getQuery()
            ->getSingleResult();

        if(is_null($campaignLink))
            return json_decode(null, 1);


        $data['id'] = $campaignLink->getId();
        $data['campaignId'] = $campaignId;

        return $data;

    }
    /**
     * @param $request
     * @param $publisherId
     * @param $linkId
     */
    public function addImpression($request, $publisherId, $linkId)
    {
        $dm = $this->dm;
        $now = new \DateTime();
        $impression = new TrackImpression();
        $impression->setIp($request->server->get('REMOTE_ADDR'));
        $impression->setReferer($request->server->get('HTTP_REFERER', null));
        $impression->setPublisher($publisherId);
        $impression->setCampaignLink($linkId);
        $impression->setUpdatedTs($now->format('Y-m-d H:i:s'));
        $impression->setVisible(1);
        $dm->flush();

    }
}
