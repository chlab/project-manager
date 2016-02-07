<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financialresource
 *
 * @ORM\Table(name="FinancialResource", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkFinancialResourceActivity_idx", columns={"activityId"})})
 * @ORM\Entity
 */
class Financialresource
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeId", type="integer", nullable=true)
     */
    private $typeid;

    /**
     * @var string
     *
     * @ORM\Column(name="plannedCost", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $plannedcost;

    /**
     * @var string
     *
     * @ORM\Column(name="actualCost", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $actualcost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;

    /**
     * @var \AppBundle\Entity\Activity
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activityId", referencedColumnName="id")
     * })
     */
    private $activityid;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeid
     *
     * @param integer $typeid
     *
     * @return Financialresource
     */
    public function setTypeid($typeid)
    {
        $this->typeid = $typeid;

        return $this;
    }

    /**
     * Get typeid
     *
     * @return integer
     */
    public function getTypeid()
    {
        return $this->typeid;
    }

    /**
     * Set plannedcost
     *
     * @param string $plannedcost
     *
     * @return Financialresource
     */
    public function setPlannedcost($plannedcost)
    {
        $this->plannedcost = $plannedcost;

        return $this;
    }

    /**
     * Get plannedcost
     *
     * @return string
     */
    public function getPlannedcost()
    {
        return $this->plannedcost;
    }

    /**
     * Set actualcost
     *
     * @param string $actualcost
     *
     * @return Financialresource
     */
    public function setActualcost($actualcost)
    {
        $this->actualcost = $actualcost;

        return $this;
    }

    /**
     * Get actualcost
     *
     * @return string
     */
    public function getActualcost()
    {
        return $this->actualcost;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Financialresource
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Financialresource
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Financialresource
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set activityid
     *
     * @param \AppBundle\Entity\Activity $activityid
     *
     * @return Financialresource
     */
    public function setActivityid(\AppBundle\Entity\Activity $activityid = null)
    {
        $this->activityid = $activityid;

        return $this;
    }

    /**
     * Get activityid
     *
     * @return \AppBundle\Entity\Activity
     */
    public function getActivityid()
    {
        return $this->activityid;
    }
}
