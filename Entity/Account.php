<?php

namespace winzou\BookBundle\Entity;


/**
 * @orm:MappedSuperclass
 */
abstract class Account
{
    /**
     * @orm:Column(type="integer")
     */
    protected $wrap;
    
    /**
     * @orm:Column(type="string")
     *
     * @assert:NotBlank()
     */
    protected $name;
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getWrap()
    {
        return $this->wrap;
    }
    public function setWrap($wrap)
    {
        $this->wrap = $wrap;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}