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

use \Symfony\Component\Security\Core\User\UserInterface;


/**
 * @orm:MappedSuperclass
 */
abstract class Entry
{
    /**
     * @orm:Column(type="date")
     */
    protected $createdAt;
    
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
    
    
    public function __construct()
    {
        $this->date = new \Datetime();
    }
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getAccount()
    {
        return $this->account;
    }
    public function setAccount(Account $account)
    {
        $account->addEntry($this);
        $this->account = $account;
    }
    
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(UserInterface $user = null)
    {
        $this->user = $user;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt(\Datetime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
    public function getLabel()
    {
        return $this->label;
    }
    public function setLabel($label)
    {
        $this->label = $label;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}