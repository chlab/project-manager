<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="Activity", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkActivityPhaseId_idx", columns={"phaseId"}), @ORM\Index(name="fkActiviyResponsibleUserId_idx", columns={"responsibleUser"})})
 * @ORM\Entity
 */
class Activity
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
     * @var boolean
     *
     * @ORM\Column(name="isMilestone", type="boolean", nullable=true)
     */
    private $ismilestone;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

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
     * @var \AppBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phaseId", referencedColumnName="id")
     * })
     */
    private $phaseid;

    /**
     * @var \AppBundle\Entity\Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsibleUser", referencedColumnName="id")
     * })
     */
    private $responsibleuser;



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
     * Set ismilestone
     *
     * @param boolean $ismilestone
     *
     * @return Activity
     */
    public function setIsmilestone($ismilestone)
    {
        $this->ismilestone = $ismilestone;

        return $this;
    }

    /**
     * Get ismilestone
     *
     * @return boolean
     */
    public function getIsmilestone()
    {
        return $this->ismilestone;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Activity
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
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return Activity
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
     * @return Activity
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Activity
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
     * @return Activity
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
     * @return Activity
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
     * Set actualstartdate
     *
     * @param \DateTime $actualstartdate
     *
     * @return Activity
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
     * @return Activity
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
     * Set phaseid
     *
     * @param \AppBundle\Entity\Phase $phaseid
     *
     * @return Activity
     */
    public function setPhaseid(\AppBundle\Entity\Phase $phaseid = null)
    {
        $this->phaseid = $phaseid;

        return $this;
    }

    /**
     * Get phaseid
     *
     * @return \AppBundle\Entity\Phase
     */
    public function getPhaseid()
    {
        return $this->phaseid;
    }

    /**
     * Set responsibleuser
     *
     * @param \AppBundle\Entity\Employee $responsibleuser
     *
     * @return Activity
     */
    public function setResponsibleuser(\AppBundle\Entity\Employee $responsibleuser = null)
    {
        $this->responsibleuser = $responsibleuser;

        return $this;
    }

    /**
     * Get responsibleuser
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getResponsibleuser()
    {
        return $this->responsibleuser;
    }
}
