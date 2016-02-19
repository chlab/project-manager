<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phase
 *
 * @ORM\Table(name="Phase", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkPhaseProjectId_idx", columns={"projectId"}), @ORM\Index(name="fkPhasePreviousPhaseId_idx", columns={"previousPhaseId"})})
 * @ORM\Entity
 */
class Phase
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualStartDate", type="date", nullable=true)
     */
    private $actualStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualEndDate", type="date", nullable=true)
     */
    private $actualEndDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="clearanceDate", type="date", nullable=true)
     */
    private $clearanceDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state;

    /**
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="phases")
     * @ORM\JoinColumn(name="projectId", referencedColumnName="id")
     */
    private $project;

    /**
     * @var \AppBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="previousPhaseId", referencedColumnName="id")
     * })
     */
    private $previousPhaseId;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Activity", mappedBy="phase")
     */
    private $activities;


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
     * Copy relevant data from an existing phase
     * 
     * @param Phase $phase
     * @return Phase
     */
    public function copyFrom(Phase $phase)
    {
        $this
            ->setName($phase->getName())
            ->setPreviousPhaseId($phase->getPreviousPhaseId())
        ;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Phase
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Phase
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
     * @return Phase
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
     * @return Phase
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
     * Set startdate
     *
     * @param \DateTime $startDate
     *
     * @return Phase
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Phase
     */
    public function setEnddate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->endDate;
    }

    /**
     * Set actualStartDate
     *
     * @param \DateTime $actualStartDate
     *
     * @return Phase
     */
    public function setActualStartDate($actualStartDate)
    {
        $this->actualStartDate = $actualStartDate;

        return $this;
    }

    /**
     * Get actualStartDate
     *
     * @return \DateTime
     */
    public function getActualStartDate()
    {
        return $this->actualStartDate;
    }

    /**
     * Set actualEndDate
     *
     * @param \DateTime $actualEndDate
     *
     * @return Phase
     */
    public function setActualendDate($actualEndDate)
    {
        $this->actualEndDate = $actualEndDate;

        return $this;
    }

    /**
     * Get actualEndDate
     *
     * @return \DateTime
     */
    public function getActualendDate()
    {
        return $this->actualEndDate;
    }

    /**
     * Set clearanceDate
     *
     * @param \DateTime $clearanceDate
     *
     * @return Phase
     */
    public function setClearanceDate($clearanceDate)
    {
        $this->clearanceDate = $clearanceDate;

        return $this;
    }

    /**
     * Get clearanceDate
     *
     * @return \DateTime
     */
    public function getClearanceDate()
    {
        return $this->clearanceDate;
    }

    /**
     * Set state
     *
     * @param boolean $state
     *
     * @return Phase
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return boolean
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return Phase
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set previousPhaseId
     *
     * @param \AppBundle\Entity\Phase $previousPhaseId
     *
     * @return Phase
     */
    public function setPreviousPhaseId(\AppBundle\Entity\Phase $previousPhaseId = null)
    {
        $this->previousPhaseId = $previousPhaseId;

        return $this;
    }

    /**
     * Get previousPhaseId
     *
     * @return \AppBundle\Entity\Phase
     */
    public function getPreviousPhaseId()
    {
        return $this->previousPhaseId;
    }

    /**
     * Get activities
     *
     * @return array
     */
    public function getActivities()
    {
        return $this->activities;
    }
}
