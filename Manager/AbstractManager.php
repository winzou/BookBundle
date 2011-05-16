<?php

/*
 * This file is part of winzouBookBundle.
 *
 * winzouBookBundle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * winzouBookBundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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