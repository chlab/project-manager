<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Humanresource
 *
 * @ORM\Table(name="HumanResource", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkHumanResourceActivityId_idx", columns={"activityId"}), @ORM\Index(name="fkHumanResourceRoleId_idx", columns={"roleId"}), @ORM\Index(name="fkHumanResourceEmployeeId_idx", columns={"employeeId"})})
 * @ORM\Entity
 */
class Humanresource
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
     * @var \AppBundle\Entity\Activity
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activityId", referencedColumnName="id")
     * })
     */
    private $activityid;

    /**
     * @var \AppBundle\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roleId", referencedColumnName="id")
     * })
     */
    private $roleid;

    /**
     * @var \AppBundle\Entity\Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employeeId", referencedColumnName="id")
     * })
     */
    private $employeeid;



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
     * Set activityid
     *
     * @param \AppBundle\Entity\Activity $activityid
     *
     * @return Humanresource
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

    /**
     * Set roleid
     *
     * @param \AppBundle\Entity\Role $roleid
     *
     * @return Humanresource
     */
    public function setRoleid(\AppBundle\Entity\Role $roleid = null)
    {
        $this->roleid = $roleid;

        return $this;
    }

    /**
     * Get roleid
     *
     * @return \AppBundle\Entity\Role
     */
    public function getRoleid()
    {
        return $this->roleid;
    }

    /**
     * Set employeeid
     *
     * @param \AppBundle\Entity\Employee $employeeid
     *
     * @return Humanresource
     */
    public function setEmployeeid(\AppBundle\Entity\Employee $employeeid = null)
    {
        $this->employeeid = $employeeid;

        return $this;
    }

    /**
     * Get employeeid
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getEmployeeid()
    {
        return $this->employeeid;
    }
}
