<?php

namespace AppBundle\Entity\Lead;

use AppBundle\Entity\Campaign\CampaignLink;
use AppBundle\Entity\Campaign\CampaignPublisher;
use AppBundle\Entity\Publisher\Publisher;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lead.
 *
 * @ORM\Table(name="Lead")
 * @ORM\Entity
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
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Campaign\CampaignLink", inversedBy="leads")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaignLinkId", referencedColumnName="id")
     * })
     */
    protected $campaignLink;

    /**
     * @var CampaignPublisher
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Campaign\CampaignPublisher", inversedBy="leads")
     */
    protected $campaignPublisher;


    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TrackConversion", mappedBy="lead")
     */
    protected $trackConversion;

    /**
     * @var Publisher
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Publisher\Publisher", inversedBy="leads")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publisherId", referencedColumnName="id")
     * })
     */
    protected $publisher;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lead\LeadFlagHistory", mappedBy="lead")
     */
    protected $leadFlagHistory;
}
