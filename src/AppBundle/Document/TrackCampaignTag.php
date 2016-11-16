<?php

namespace AppBundle\Document;

use AppBundle\Document\Campaign\Campaign;
use AppBundle\Document\Campaign\CampaignTag;
use AppBundle\Document\Lead\Lead;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * TrackCampaignTag.
 *
 * @ODM\Collection(name="TrackCampaignTag")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackCampaignTag
{
    /**
     * @var int
     *
     * @ODM\Field(name="id", type="integer")
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    public $id;

    /**
     * @var string
     *
     * @ODM\Field(name="request", type="string")
     */
    public $request;

    /**
     * @var string
     *
     * @ODM\Field(name="response", type="string")
     */
    public $response;

    /**
     * @var \DateTime
     *
     * @ODM\Field(name="updateTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    public $updateTs;

    /**
     * @var Lead
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Lead\Lead")
     */
    public $lead;

    /**
     * @var CampaignTag
     *
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\TrackCampaignTag")
     */
    public $campaignTag;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set request.
     *
     * @param string $request
     *
     * @return TrackCampaignTag
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get request.
     *
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set response.
     *
     * @param string $response
     *
     * @return TrackCampaignTag
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set updatedTs.
     *
     * @param \DateTime $updatedTs
     *
     * @return TrackCampaignTag
     */
    public function setUpdatedTs($updatedTs)
    {
        $this->updatedTs =json_encode($updatedTs);

        return $this;
    }

    /**
     * Get updatedTs.
     *
     * @return string
     */
    public function getUpdatedTs()
    {
        return (object) json_decode($this->updatedTs);
    }

    /**
     * Set lead.
     *
     * @param Lead $lead
     *
     * @return TrackCampaignTag
     */
    public function setLead(Lead $lead = null)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * Get lead.
     *
     * @return int
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * Set tag.
     *
     * @param CampaignTag $tag
     *
     * @return TrackCampaignTag
     */
    public function setCampaignTag(CampaignTag $tag = null)
    {
        $this->campaignTag = $tag;

        return $this;
    }

    /**
     * Get tag.
     *
     * @return int
     */
    public function getCampaignTag()
    {
        return $this->campaignTag;
    }
}
