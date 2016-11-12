<?php

namespace AppBundle\Entity\Campaign;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Loggable\Entity\LogEntry;

/**
 * AppBundle\Entity\CampaignLogEntry.
 *
 * @Table(
 *     name="CampaignLogEntry",
 *  indexes={
 *      @Index(name="campaign_log_class_lookup_idx", columns={"object_class"}),
 *      @Index(name="campaign_log_date_lookup_idx", columns={"logged_at"}),
 *      @Index(name="campaign_log_user_lookup_idx", columns={"username"}),
 *      @Index(name="campaign_log_version_lookup_idx", columns={"object_id", "object_class", "version"})
 *  }
 * )
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class CampaignLogEntry extends LogEntry
{
    /**
     * @var Campaign
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Campaign\Campaign")
     */
    protected $parent;

    /**
     * Set campaign.
     *
     * @param Campaign|null $parent
     * @return $this
     */
    public function setParent(Campaign $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get campaign.
     *
     * @return Campaign
     */
    public function getParent()
    {
        return $this->parent;
    }
}
