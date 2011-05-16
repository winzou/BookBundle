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


namespace winzou\BookBundle\Entity;

use winzou\BookBundle\Entity\Account;
use \Symfony\Component\Security\Core\User\UserInterface;


/**
 * Entity Entry
 * @author winzou
 *
 * @orm:MappedSuperclass
 */
abstract class Entry
{
    /**
     * @orm:Column(type="date")
     */
    protected $created_at;
    
    /**
     * @orm:Column(type="string")
     *
     * @assert:NotBlank()
     */
    protected $label;
    
    /**
     * @orm:Column(type="decimal", scale="2")
     */
    protected $amount;
    
    /**
     * To be overrided by developer if needed - not mapped yet
     * @var UserInterface
     */
    protected $user;
    
    
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->date = new \Datetime();
    }
    
    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get Account
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }
    /**
     * Set Account
     * @param Account $account
     */
    public function setAccount(Account $account)
    {
        $account->addEntry($this);
        $this->account = $account;
    }
    
    /**
     * Get user
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set user
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user = null)
    {
        $this->user = $user;
    }
    
    /**
     * Get created_at
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    /**
     * Set created_at
     * @param \Datetime $createdAt
     */
    public function setCreatedAt(\Datetime $createdAt)
    {
        $this->created_at = $createdAt;
    }
    
    /**
     * Get label
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    /**
     * Set label
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }
    
    /**
     * Get amount
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
    /**
     * Set amount
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}