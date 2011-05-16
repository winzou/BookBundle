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

namespace winzou\BookBundle\Controller;

/** @todo Beautiful dependency */
use Asso\AMBundle\DependencyInjection\MyController;

use Symfony\Component\Httpfoundation\Response;

use winzou\BookBundle\Entity;

class BookController extends MyController
{
    public function indexAction()
    {
        $users = $this->em->getRepository('Asso\AMBundle\Entity\User');
        $winzous = $this->em->getRepository('Asso\AMBundle\Entity\Asso');
        $accounts = $this->em->getRepository('Asso\BookBundle\Entity\Account');
        $entries = $this->em->getRepository('winzou\BookBundle\Entity\Entry');
        
        $user = $users->find(1);
        
        /*
        $entry = new Entity\Entry;
        $entry->setUser($user);
        $entry->setAmount(99);
        $entry->setLabel('Second buy');
        */
        
        /*
        $account = new Entity\Account;
        $account->setName('Banque');
        $this->em->persist($account);
        */
        
        /*
        $account = $accounts->find(1);
        $entry->setAccount($account);
        
        $itemClass = new Entity\ItemClass;
        $itemClass->setNamespace(get_class($account));
        $this->em->persist($itemClass);
        
        $item = new Entity\Item;
        $item->setClass($itemClass);
        $item->setObjectId($account->getId());
        $this->em->persist($item);
        
        $entry->setItem($item);
        
        $this->em->persist($entry);
        $this->em->flush();
        */
        
        /*
        foreach($this->get('winzou_book.entry_manager')->findEntriesByAccount(array(1,2), false) as $entry)
        {
            var_dump($entry->getUser()->getUsername());
        }
        */
        
        
		return $this->myRender('winzouBookBundle:Book:index');
	}
}