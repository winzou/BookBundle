<?php

namespace winzou\BookBundle\Manager;

use winzou\BookBundle\Entity\Entry;

use Doctrine\ORM\Query;

class EntryManager extends AbstractManager
{
    /**
     * Create and return an Entry
     * @return Entry
     */
    public function createEntry()
    {
        return parent::create();
    }
    
    /**
     * Delete the given Entry
     * @param Entry $entry
     */
    public function deleteEntry(Entry $entry)
    {
        return parent::delete($entry);
    }
    
    /**
     * Return a list of entries belonging to the given list of accounts
     * @param array $accounts
     * @param bool $array Retrieve a read-only array instead of an ArrayCollection
     * @return array|ArrayCollection
     */
    public function findEntriesByAccount(array $account_ids, $array = true)
    {
        $qb = $this->repository->createQueryBuilder('e');
        
        $qb = $this->addAssociations($qb);
        
        $qb->where($qb->expr()->in('e.account', $account_ids));
        
        return $qb->getQuery()->getResult( $array ? Query::HYDRATE_ARRAY : Query::HYDRATE_OBJECT );
    }
    
    /**
     * Return a Entry according to criteria
     * @param array $criteria
     * @return Entry
     */
    public function findEntryBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Return a list of Entry according to criteria
     * @param array $criteria
     * @return ArrayCollection
     */
    public function findEntriesBy(array $criteria = array())
    {
        return $this->repository->findBy($criteria);
    }
}