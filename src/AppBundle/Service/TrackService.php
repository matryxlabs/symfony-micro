<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class TrackService
{
    protected $em;
    protected $client;

    public function __construct(EntityManager $entityManager, Client $client){
        $this->em = $entityManager;
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

        $connection = $this->em->getConnection();
        //Check if the values we have are ok and match togethere. At the same time we get the campaign Id
        $query = 'SELECT
                p.id,
                cl.campaignId
            FROM Publisher p
            INNER JOIN CampaignPublisher cp ON cp.publisherId = p.id
            INNER JOIN CampaignLink cl ON cl.campaignId = cp.campaignId
            WHERE
                p.id = :publisherId
                AND p.visible = 1
                AND cp.visible = 1
                AND cl.id = :linkId
                AND cl.visible = 1;';

        $data = json_encode($connection->fetchAssoc($query, ['publisherId' => $publisherId, 'linkId' => $linkId]));
        return json_decode($data, 1);
    }
    /**
     * @param $request
     * @param $publisherId
     * @param $linkId
     */
    public function addImpression($request, $publisherId, $linkId)
    {
        $connection = $this->em->getConnection();
        $now = new \DateTime();
        $connection->insert('TrackImpression', [
            'ip' => $request->server->get('REMOTE_ADDR'),
            'referer' => $request->server->get('HTTP_REFERER', null),
            'publisherId' => $publisherId,
            'campaignLinkId' => $linkId,
            'updatedTs' => $now->format('Y-m-d H:i:s'),
            'visible' => 1,
        ]);
    }
}
