<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Campaign\Campaign;
use AppBundle\Entity\Campaign\CampaignLink;
use AppBundle\Entity\Campaign\CampaignPublisher;
use AppBundle\Entity\Channel;
use AppBundle\Entity\Publisher\Publisher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Track the impression based on link id and publisher id, return a 1x1 pixel.
 *
 * Class ImpressionTrackingController
 */

class PopulateMysqlController extends Controller
{
    /**
     * @Route("/populate-mysql")
     *
     * Check the parameter's validity, update stats, return pixel.
     *
     * @param Request $request
     * @return Response
     */

    public function populateMysqlAction(Request $request)
    {
        $updated = new \DateTime();
        $entityManager= $this->get('doctrine')->getManager();
        $publisher = new Publisher();
        $publisher->setOrgname('Some publisher name');
        $publisher->setOrgurl('http://symfony-micro.dev');
        $publisher->setVisible(true);
        $publisher->setVerified('true');
        $publisher->setSource('Some source');
        $publisher->setDefaultSubId('Some subId');
        $publisher->setSignupToken('58b890595c801e8cc15d91a3b204d878');
        $publisher->setUpdatedTs($updated);
        $entityManager->persist($publisher);


        $campaign = new Campaign();
        $campaign->setUpdatedTs($updated);
        $entityManager->persist($campaign);

        $channel = new Channel();
        $channel->setName('Some channel');
        $channel->setUpdatedTs($updated);
        $entityManager->persist($channel);

        $campaignPublisher = new CampaignPublisher();
        $campaignPublisher->setBaseCurrencyPayout('10.00');
        $campaignPublisher->setPayout('10.00');
        $campaignPublisher->setLeadsRequired(10);
        $startTs = new \DateTime();
        $endTs = clone $startTs;
        $startTs->setDate('2016', '11', '09');
        $endTs->setDate('2017', '12', '09');
        $campaignPublisher->setStartTs($startTs);
        $campaignPublisher->setEndTs($endTs);
        $campaignPublisher->setSignName('59bcc3ad6775562f845953cf01624225');
        $campaignPublisher->setLinkHash('d7c459deeafa5e02083dad427869402a');
        $campaignPublisher->setVisible(true);
        $campaignPublisher->setCurrent(true);
        $campaignPublisher->setCampaign($campaign);
        $campaignPublisher->setPublisher($publisher);
        $campaignPublisher->setUpdatedTs($updated);
        $entityManager->persist($campaignPublisher);

        $campaignLink = new CampaignLink();
        $campaignLink->setChannel($channel);
        $campaignLink->setName('Campaign Link #id 1');
        $campaignLink->setDescription('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.');
        $campaignLink->setEnabled(true);
        $campaignLink->setPlaceholder('Some placeholder');
        $campaignLink->setDestination('http://symfony-micro.dev/populate-mysql');
        $campaignLink->setDescription('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
        $campaignLink->setShowOnWebsite(true);
        $campaignLink->setVisible(true);
        $campaignLink->setCampaign($campaign);
        $campaignLink->setUpdatedTs($updated);
        $entityManager->persist($campaignLink);

        $entityManager->flush();

        return $this->render('AppBundle:Default:index.html.twig', [
            'message' => 'Publisher added',
            'pixel' => ''
        ]);

    }
}
