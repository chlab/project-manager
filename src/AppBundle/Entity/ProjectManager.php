<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
 
/**
 * Entity Manager class for Projects
 */
class ProjectManager
{
    /**
     * Holds the Doctrine entity manager for database interaction
     * @var EntityManager 
     */
    protected $em;
 
    /**
     * Entity-specific repo, useful for finding entities, for example
     * @var EntityRepository
     */
    protected $repo;
 
    /**
     * The Fully-Qualified Class Name for our entity
     * @var string
     */
    protected $class;
 
    /**
     * Setup Entity Manager
     * 
     * @param EntityManager $em
     * @param string $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->class = $class;
        $this->repo = $em->getRepository($class);
    }

    /**
     * Creates a new project from an existing template
     * 
     * @return ProjectManager
     */
    public function createProjectFromTemplate(Project $project)
    {
        // copy from this template
        $template = $this->repo->find($project->getCopiedFrom());

        $this->em->persist($project);

        // copy phases from template
        foreach ($template->getPhases() as $tplPhase) {
            $phase = new Phase();
            $phase
                ->copyFrom($tplPhase)
                ->setProject($project)
            ;
            $this->em->persist($phase);
        }

        $this->em->flush();
    }
}
