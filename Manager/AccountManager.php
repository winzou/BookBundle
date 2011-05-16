<?php

namespace winzou\BookBundle\Manager;

use winzou\BookBundle\Entity\Account;

class AccountManager extends AbstractManager
{
    /**
     * Create and return an Account
     * @return Account
     */
    public function createAccount()
    {
        return parent::create();
    }
    
    /**
     * Delete the given Account
     * @param Account $Account
     */
    public function deleteAccount(Account $account)
    {
        return parent::delete($account);
    }
    
    /**
     * Return a Account according to criteria
     * @param array $criteria
     * @return Account
     */
    public function findAccountBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Return a list of Account according to criteria
     * @param array $criteria
     * @return ArrayCollection
     */
    public function findAccountsBy(array $criteria = array())
    {
        return $this->repository->findBy($criteria);
    }
}