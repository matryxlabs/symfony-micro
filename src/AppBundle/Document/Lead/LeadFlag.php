<?php

namespace AppBundle\Document\Lead;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * LeadFlag
 *
 * @ODM\Collection(name="LeadFlag")
 * @ODM\Document
 * @ORM\HasLifecycleCallbacks
 * @ORM\ChangeTrackingPolicy("NOTIFY")
 */
class LeadFlag
{
    const FLAG_VALID = 1;
    const FLAG_INVALID = 2;
    const FLAG_CAUTION = 3;
    const FLAG_TEST = 4;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * @return LeadFlag
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
}
