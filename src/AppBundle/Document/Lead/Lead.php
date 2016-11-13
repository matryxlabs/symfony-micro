<?php

namespace AppBundle\Document\Lead;

use AppBundle\Document\Campaign\CampaignLink;
use AppBundle\Document\Campaign\CampaignPublisher;
use AppBundle\Document\Publisher\Publisher;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Lead.
 *
 * @ODM\Collection(name="Lead")
 * @ODM\Document
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class Lead
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    protected $id;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\Campaign\CampaignLink", inversedBy="leads")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignLinkId", referencedColumnName="id")
     * })
     */
    protected $campaignLink;

    /**
     * @var CampaignPublisher
     *
     * @ODM\ReferenceOne(targetEntity="AppBundle\Document\Campaign\CampaignPublisher", inversedBy="leads")
     */
    protected $campaignPublisher;


    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\TrackConversion", mappedBy="lead")
     */
    protected $trackConversion;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetEntity="AppBundle\Document\Publisher\Publisher", inversedBy="leads")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publisherId", referencedColumnName="id")
     * })
     */
    protected $publisher;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetEntity="AppBundle\Document\Lead\LeadFlagHistory", mappedBy="lead")
     */
    protected $leadFlagHistory;
}
