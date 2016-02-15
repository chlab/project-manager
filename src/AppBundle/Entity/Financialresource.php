<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financialresource
 *
 * @ORM\Table(name="FinancialResource", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkFinancialResourceActivity_idx", columns={"activityId"}), @ORM\Index(name="fkFinancialResourceCostTypeId", columns={"costTypeId"})})
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
     * @var string
     *
     * @ORM\Column(name="plannedCost", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $plannedCost;

    /**
     * @var string
     *
     * @ORM\Column(name="actualCost", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $actualCost;

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
     * @var \AppBundle\Entity\Costtype
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Costtype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="costTypeId", referencedColumnName="id")
     * })
     */
    private $costType;

    /**
     * @var \AppBundle\Entity\Activity
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activity", inversedBy="financialResources")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activityId", referencedColumnName="id")
     * })
     */
    private $activity;


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
     * Set plannedCost
     *
     * @param string $plannedCost
     *
     * @return Financialresource
     */
    public function setPlannedCost($plannedCost)
    {
        $this->plannedCost = $plannedCost;

        return $this;
    }

    /**
     * Get plannedCost
     *
     * @return string
     */
    public function getPlannedCost()
    {
        return $this->plannedCost;
    }

    /**
     * Set actualCost
     *
     * @param string $actualCost
     *
     * @return Financialresource
     */
    public function setActualCost($actualCost)
    {
        $this->actualCost = $actualCost;

        return $this;
    }

    /**
     * Get actualCost
     *
     * @return string
     */
    public function getActualCost()
    {
        return $this->actualCost;
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
     * Set costType
     *
     * @param \AppBundle\Entity\Costtype $costType
     *
     * @return Financialresource
     */
    public function setCostType(\AppBundle\Entity\Costtype $costType = null)
    {
        $this->costType = $costType;

        return $this;
    }

    /**
     * Get costType
     *
     * @return \AppBundle\Entity\Costtype
     */
    public function getCostType()
    {
        return $this->costType;
    }

    /**
     * Set activity
     *
     * @param \AppBundle\Entity\Activity $activity
     *
     * @return Financialresource
     */
    public function setActivity(\AppBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \AppBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
