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
    private $isMilestone;

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
    private $actualStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="actualEndDate", type="date", nullable=true)
     */
    private $actualEndDate;

    /**
     * @var \AppBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Phase", inversedBy="activities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phaseId", referencedColumnName="id")
     * })
     */
    private $phase;

    /**
     * @var \AppBundle\Entity\Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsibleUser", referencedColumnName="id")
     * })
     */
    private $responsibleUser;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Humanresource", mappedBy="activity")
     */
    private $humanResources;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Financialresource", mappedBy="activity")
     */
    private $financialResources;
    

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
     * Set isMilestone
     *
     * @param boolean $isMilestone
     *
     * @return Activity
     */
    public function setIsmilestone($isMilestone)
    {
        $this->isMilestone = $isMilestone;

        return $this;
    }

    /**
     * Get isMilestone
     *
     * @return boolean
     */
    public function getIsmilestone()
    {
        return $this->isMilestone;
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Activity
     */
    public function setStartdate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Activity
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
     * Set actualStartDate
     *
     * @param \DateTime $actualStartDate
     *
     * @return Activity
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
     * @return Activity
     */
    public function setActualEndDate($actualEndDate)
    {
        $this->actualEndDate = $actualEndDate;

        return $this;
    }

    /**
     * Get actualEndDate
     *
     * @return \DateTime
     */
    public function getActualEndDate()
    {
        return $this->actualEndDate;
    }

    /**
     * Set phase
     *
     * @param \AppBundle\Entity\Phase $phase
     *
     * @return Activity
     */
    public function setPhase(\AppBundle\Entity\Phase $phase = null)
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * Get phase
     *
     * @return \AppBundle\Entity\Phase
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Set responsibleUser
     *
     * @param \AppBundle\Entity\Employee $responsibleUser
     *
     * @return Activity
     */
    public function setResponsibleuser(\AppBundle\Entity\Employee $responsibleUser = null)
    {
        $this->responsibleUser = $responsibleUser;

        return $this;
    }

    /**
     * Get responsibleUser
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getResponsibleuser()
    {
        return $this->responsibleUser;
    }

    /**
     * Get project of associated phase
     * @return \AppBundle\Entity\Project
     */
    public function getAssociatedProject()
    {
        $phase = $this->getPhase();
        return $phase->getProject();
    }

    /**
     * Get human resources
     *
     * @return array
     */
    public function getHumanResources()
    {
        return $this->humanResources;
    }

    /**
     * Get financial resources
     *
     * @return array
     */
    public function getFinancialResources()
    {
        return $this->financialResources;
    }
}
