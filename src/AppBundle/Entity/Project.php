<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Form\ProjectType;

/**
 * Project
 *
 * @ORM\Table(name="Project", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkProjectManagerEmployee_idx", columns={"projectManager"}), @ORM\Index(name="fkProjectCopiedFrom_idx", columns={"copiedFrom"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProjectRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Project
{
    /**
     * @const integer
     */
    const STATE_NEW = 0;

    /**
     * @const integer
     */
    const STATE_ACTIVE = 1;

    /**
     * @const integer
     */
    const STATE_COMPLETED = 2;

    /**
     * @const integer
     */
    const STATE_CANCELLED = 3;

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
     * @ORM\Column(name="isTemplate", type="boolean", nullable=false)
     */
    private $isTemplate = false;

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
     * @var integer
     *
     * @ORM\Column(name="priority", type="smallint", nullable=true)
     */
    private $priority;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="smallint", nullable=true)
     */
    private $state = 0;

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
     * @var \AppBundle\Entity\Employee
     *
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projectManager", referencedColumnName="id")
     * })
     */
    private $projectManager;

    /**
     * @var \AppBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="copiedFrom", referencedColumnName="id")
     * })
     */
    private $copiedFrom;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Phase", mappedBy="project")
     */
    private $phases;


    /**
     * Setup entity
     */
    public function __construct() 
    {
        $this->setCreated(new \DateTime());
    }

    /**
     * Start project
     *     
     * @return Project
     */
    public function start()
    {
        $this
            ->setActualStartDate(new \DateTime())
            ->setState(self::STATE_ACTIVE)
        ;
    }

    /**
     * Cancel project
     *     
     * @return Project
     */
    public function cancel()
    {
        $this
            ->setActualEndDate(new \DateTime())
            ->setState(self::STATE_CANCELLED)
        ;
    }

    /**
     * Complete project
     *     
     * @return Project
     */
    public function complete()
    {
        $this
            ->setActualEndDate(new \DateTime())
            ->setState(self::STATE_COMPLETED)
        ;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     *
     * @return Project
     */
    public function updateModified()
    {
        $this->setModified(new \DateTime());
    }

    /**
     * Get the name of the template this project was copied from
     * This is only relevant for the gui
     * 
     * @return string
     */
    public function getTemplate()
    {
        return $this->getCopiedFrom()->getTitle();
    }

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
     * Set isTemplate
     *
     * @param boolean $isTemplate
     *
     * @return Project
     */
    public function setIsTemplate($isTemplate)
    {
        $this->isTemplate = $isTemplate;

        return $this;
    }

    /**
     * Get isTemplate
     *
     * @return boolean
     */
    public function getIsTemplate()
    {
        return $this->isTemplate;
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
     * Set priority
     *
     * @param integer $priority
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
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get priority as text
     *
     * @return string
     */
    public function getPriorityText()
    {
        $priorities = ProjectType::PRIORITIES;
        $prio  = $this->getPriority();
        if (!is_null($prio)) {
            return $priorities[$prio];
        }
        else {
            return '';
        }
    }

    /**
     * Set state
     *
     * @param integer $state
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
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Is project new?
     * 
     * @return boolean
     */
    public function isNew()
    {
        return $this->getState() == self::STATE_NEW;
    }

    /**
     * Is project active?
     * 
     * @return boolean
     */
    public function isActive()
    {
        return $this->getState() == self::STATE_ACTIVE;
    }

    /**
     * Is project completed?
     * 
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->getState() == self::STATE_COMPLETED;
    }

    /**
     * Is project cancelled?
     * 
     * @return boolean
     */
    public function isCancelled()
    {
        return $this->getState() == self::STATE_CANCELLED;
    }

    /**
     * Get state as text
     *
     * @return string
     */
    public function getStateText()
    {
        $states = ProjectType::STATES;
        $state  = $this->getState();
        if (!is_null($state)) {
            return $states[$state];
        }
        else {
            return '';
        }
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Project
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * Set projectManager
     *
     * @param \AppBundle\Entity\Employee $projectManager
     *
     * @return Project
     */
    public function setProjectManager(\AppBundle\Entity\Employee $projectManager = null)
    {
        $this->projectManager = $projectManager;

        return $this;
    }

    /**
     * Get projectManager
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getProjectManager()
    {
        return $this->projectManager;
    }

    /**
     * Set copiedFrom
     *
     * @param \AppBundle\Entity\Project $copiedFrom
     *
     * @return Project
     */
    public function setCopiedFrom(\AppBundle\Entity\Project $copiedFrom = null)
    {
        $this->copiedFrom = $copiedFrom;

        return $this;
    }

    /**
     * Get copiedFrom
     *
     * @return \AppBundle\Entity\Project
     */
    public function getCopiedFrom()
    {
        return $this->copiedFrom;
    }

    /**
     * Get phases
     *
     * @return array
     */
    public function getPhases()
    {
        return $this->phases;
    }
}
