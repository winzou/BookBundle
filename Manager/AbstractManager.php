<?php

namespace winzou\BookBundle\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * Abstract Entity Manager
 * @author winzou
 */
abstract class AbstractManager
{
    /**
     * @var EntityManager
     */
    protected $em;
    
    /**
     * @var EntityRepository
     */
    protected $repository;
    
    /**
     * @var string
     */
    protected $class;

    /**
     * Constructor.
     *
     * @param EntityManager  $em
     * @param string         $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em         = $em;
        $this->repository = $em->getRepository($class);
        
        $this->class = $em->getClassMetadata($class)->name;
    }
    
    /**
     * Add requested associations to given QueryBuilder
     * @param QueryBuilder $qb
     * @param array $associations
     * @return QueryBuilder
     */
    protected function addAssociations(QueryBuilder $qb, array $associations = array())
    {
        foreach( $this->em->getClassMetadata($this->class)->associationMappings as $name => $rel )
        {
            // check if @param is empty (means we join all associations) or if current $name is requested by @param
            if( ! $associations OR in_array($name, $associations) )
            {
                $qb->innerJoin($qb->getRootAlias().'.'.$rel['fieldName'], $rel['fieldName']);
                $qb->addSelect($rel['fieldName']);
            }
        }
        
        return $qb;
    }
}