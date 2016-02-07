<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Project
 *
 * @ORM\Table(name="Project", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkProjectManagerEmployee_idx", columns={"projectManager"}), @ORM\Index(name="fkProjectCopiedFrom_idx", columns={"copiedFrom"})})
 * @ORM\Entity
 */
class Project
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
     * @ORM\Column(name="isTemplate", type="boolean", nullable=true)
     */
    private $istemplate;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

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
     * @ORM\Column(name="permissionDate", type="date", nullable=true)
     */
    private $permissiondate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="priority", type="boolean", nullable=true)
     */
    private $priority;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state;

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
     * @var \AppBundle\Entity\Employee
     *
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projectManager", referencedColumnName="id")
     * })
     */
    private $projectmanager;

    /**
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="copiedFrom", referencedColumnName="id")
     * })
     */
    private $copiedfrom;



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
     * Set istemplate
     *
     * @param boolean $istemplate
     *
     * @return Project
     */
    public function setIstemplate($istemplate)
    {
        $this->istemplate = $istemplate;

        return $this;
    }

    /**
     * Get istemplate
     *
     * @return boolean
     */
    public function getIstemplate()
    {
        return $this->istemplate;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * Set permissiondate
     *
     * @param \DateTime $permissiondate
     *
     * @return Project
     */
    public function setPermissiondate($permissiondate)
    {
        $this->permissiondate = $permissiondate;

        return $this;
    }

    /**
     * Get permissiondate
     *
     * @return \DateTime
     */
    public function getPermissiondate()
    {
        return $this->permissiondate;
    }

    /**
     * Set priority
     *
     * @param boolean $priority
     *
     * @return Project
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return boolean
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set state
     *
     * @param boolean $state
     *
     * @return Project
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
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * Set projectmanager
     *
     * @param \AppBundle\Entity\Employee $projectmanager
     *
     * @return Project
     */
    public function setProjectmanager(\AppBundle\Entity\Employee $projectmanager = null)
    {
        $this->projectmanager = $projectmanager;

        return $this;
    }

    /**
     * Get projectmanager
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getProjectmanager()
    {
        return $this->projectmanager;
    }

    /**
     * Set copiedfrom
     *
     * @param \AppBundle\Entity\Project $copiedfrom
     *
     * @return Project
     */
    public function setCopiedfrom(\AppBundle\Entity\Project $copiedfrom = null)
    {
        $this->copiedfrom = $copiedfrom;

        return $this;
    }

    /**
     * Get copiedfrom
     *
     * @return \AppBundle\Entity\Project
     */
    public function getCopiedfrom()
    {
        return $this->copiedfrom;
    }
}
