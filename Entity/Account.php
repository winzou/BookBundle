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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entity Account
 * @author winzou
 *
 * @ORM\MappedSuperclass
 */
abstract class Account
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $wrap;
    
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    protected $name;
    
    
    /**
     * Dump the name
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
     * Get wrap
     */
    public function getWrap()
    {
        return $this->wrap;
    }
    /**
     * Set wrap
     * @param $wrap
     */
    public function setWrap($wrap)
    {
        $this->wrap = $wrap;
    }
    
    /**
     * Get name
	 * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set name
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}