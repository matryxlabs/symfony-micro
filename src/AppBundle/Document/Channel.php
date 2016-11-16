<?php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Channel.
 *
 * @ODM\Collection(name="Channel")
 * @ODM\Document
 * @ODM\HasLifecycleCallbacks
 * @ODM\ChangeTrackingPolicy("NOTIFY")
 */
class Channel
{
    const ID_DISPLAY = 1;
    const ID_TEXT = 2;
    const ID_EMAIL = 3;
    const ID_SOCIAL = 4;
    const ID_MOBILE = 5;
    const ID_SEARCH = 6;
    const ID_API = 7;

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
     * @ODM\Field(name="name", type="string")
     */
    public $name;

    /**
     * @var string
     *
     * @ODM\Field(name="updatedTs", type="string")
     * @Gedmo\Timestampable(on="update")
     * @Gedmo\Timestampable(on="create")
     */
    public $updatedTs;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Channel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set updatedTs.
     *
     * @param \DateTime $updatedTs
     *
     * @return Channel
     */
    public function setUpdatedTs($updatedTs)
    {
        $this->updatedTs =json_encode($updatedTs);

        return $this;
    }

    /**
     * Get updatedTs.
     *
     * @return \DateTime
     */
    public function getUpdatedTs()
    {
        return (object) json_decode($this->updatedTs);
    }
}
