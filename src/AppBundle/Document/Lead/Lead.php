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
 * @ODM\EmbeddedDocument()
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class Lead
{
    /**
     * @var string
     *
     * @ODM\Field(name="id", type="string")
     * @ODM\Id(strategy="UUID", type="string")
     */

    protected $id;

    /**
     * @var CampaignLink
     *
     * @ODM\ReferenceOne(targetDocument="\AppBundle\Document\Campaign\CampaignLink", inversedBy="leads")
     * @ODM\EmbedOne(targetDocument="\AppBundle\Document\Campaign\CampaignLink")
     */
    protected $campaignLink;

    /**
     * @var CampaignPublisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Campaign\CampaignPublisher", inversedBy="leads")
     */
    protected $campaignPublisher;


    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\TrackConversion", mappedBy="lead")
     */
    protected $trackConversion;

    /**
     * @var Publisher
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Publisher\Publisher", inversedBy="leads")
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Publisher\Publisher")
     */
    protected $publisher;

    /**
     * @var Collection
     *
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Lead\LeadFlagHistory", mappedBy="lead")
     */
    protected $leadFlagHistory;
}
