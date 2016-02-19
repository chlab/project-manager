<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Project Repository
 */
class ProjectRepository extends EntityRepository
{
	/**
	 * Returns a query builder for project templates
	 * 
	 * @return Doctrine\ORM\QueryBuilder
	 */
	public function queryProjectTemplates()
	{
		$query = $this->createQueryBuilder('p')
			->where('p.isTemplate = 1')
		;
		return $query;
	}

	/**
	 * Find all project templates
	 *
	 * @return array
	 */
	public function findProjectTemplates()
	{
		return $this->queryProjectTemplates()
			->getQuery()
			->getResult()
		;
	}
}