<?php

namespace AppBundle\Document;

use AppBundle\Document\Lead\Lead;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * TrackCampaignTag.
 *
 * @ODM\Collection(name="TrackCampaignTag")
 * @ODM\Document
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class TrackCampaignTag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="request", type="text")
     */
    private $request;

    /**
     * @var string
     *
     * @ORM\Column(name="response", type="text")
     */
    private $response;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateTs", type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    private $updateTs;

    /**
     * @var int
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\Lead\Lead")
     */
    private $lead;

    /**
     * @var int
     *
     * @ODM\ReferenceOne(targetEntity="\AppBundle\Document\TrackCampaignTag")
     */
    private $campaignTag;

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
     * Set updateTs.
     *
     * @param \DateTime $updateTs
     *
     * @return TrackCampaignTag
     */
    public function setUpdateTs($updateTs)
    {
        $this->updateTs = $updateTs;

        return $this;
    }

    /**
     * Get updateTs.
     *
     * @return \DateTime
     */
    public function getUpdateTs()
    {
        return $this->updateTs;
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
