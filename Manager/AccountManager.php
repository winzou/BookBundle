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

use winzou\BookBundle\Entity\Account;

/**
 * AccountManager
 * @author winzou
 */
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