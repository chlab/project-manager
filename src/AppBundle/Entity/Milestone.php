<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Milestone
 *
 * @ORM\Table(name="Activity", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fkActivityPhaseId_idx", columns={"phaseId"}), @ORM\Index(name="fkActiviyResponsibleUserId_idx", columns={"responsibleUser"})})
 * @ORM\Entity
 */
class Milestone extends Activity
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="isMilestone", type="boolean", nullable=true)
     */
    protected $isMilestone = true;
}