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
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date", nullable=true)
     */
    private $enddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualStartDate", type="date", nullable=true)
     */
    private $actualstartdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualEndDate", type="date", nullable=true)
     */
    private $actualenddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="clearanceDate", type="date", nullable=true)
     */
    private $clearancedate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state;

    /**
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projectId", referencedColumnName="id")
     * })
     */
    private $projectid;

    /**
     * @var \AppBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="previousPhaseId", referencedColumnName="id")
     * })
     */
    private $previousphaseid;



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
     * @param \DateTime $startdate
     *
     * @return Phase
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return Phase
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set actualstartdate
     *
     * @param \DateTime $actualstartdate
     *
     * @return Phase
     */
    public function setActualstartdate($actualstartdate)
    {
        $this->actualstartdate = $actualstartdate;

        return $this;
    }

    /**
     * Get actualstartdate
     *
     * @return \DateTime
     */
    public function getActualstartdate()
    {
        return $this->actualstartdate;
    }

    /**
     * Set actualenddate
     *
     * @param \DateTime $actualenddate
     *
     * @return Phase
     */
    public function setActualenddate($actualenddate)
    {
        $this->actualenddate = $actualenddate;

        return $this;
    }

    /**
     * Get actualenddate
     *
     * @return \DateTime
     */
    public function getActualenddate()
    {
        return $this->actualenddate;
    }

    /**
     * Set clearancedate
     *
     * @param \DateTime $clearancedate
     *
     * @return Phase
     */
    public function setClearancedate($clearancedate)
    {
        $this->clearancedate = $clearancedate;

        return $this;
    }

    /**
     * Get clearancedate
     *
     * @return \DateTime
     */
    public function getClearancedate()
    {
        return $this->clearancedate;
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
     * Set projectid
     *
     * @param \AppBundle\Entity\Project $projectid
     *
     * @return Phase
     */
    public function setProjectid(\AppBundle\Entity\Project $projectid = null)
    {
        $this->projectid = $projectid;

        return $this;
    }

    /**
     * Get projectid
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProjectid()
    {
        return $this->projectid;
    }

    /**
     * Set previousphaseid
     *
     * @param \AppBundle\Entity\Phase $previousphaseid
     *
     * @return Phase
     */
    public function setPreviousphaseid(\AppBundle\Entity\Phase $previousphaseid = null)
    {
        $this->previousphaseid = $previousphaseid;

        return $this;
    }

    /**
     * Get previousphaseid
     *
     * @return \AppBundle\Entity\Phase
     */
    public function getPreviousphaseid()
    {
        return $this->previousphaseid;
    }
}
