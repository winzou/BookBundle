winzouBookBundle
=================

What's that?
-------------

winzouBookBundle is an early-stage bundle which aims to provide a very simple book-keeping api.

Contribution
-------------

As the bundle is not started yet, and is still in conception stage, contributors interested in it should wait till I release a first shot.

Configuration
-------------

Please do :

* Extend the Entry entity with the definition of id, user and account. Exemple (yourApp/src/yourApp/BookBundle/Entity/Entry.php) :

		<?php
		
		namespace Asso\BookBundle\Entity;
		
		use \winzou\BookBundle\Entity\Entry as BaseEntry;
		
		use \Symfony\Component\Security\Core\User\UserInterface;
		
		/**
		 * @orm:Entity
		 * @orm:Table(name="ass_book_entry")
		 */
		class Entry extends BaseEntry
		{
		    /**
		     * @orm:Id
		     * @orm:Column(type="integer")
		     * @orm:GeneratedValue(strategy="AUTO")
		     */
		    protected $id;
		    
		    /**
		     * @orm:ManyToOne(targetEntity="Asso\AMBundle\Entity\User")
		     */
		    protected $user;
		    
		    /**
		     * @orm:ManyToOne(targetEntity="Asso\BookBundle\Entity\Account")
		     * @orm:JoinColumn(nullable=false)
		     */
		    protected $account;
		}

* Extend the Account entity with the definition of id and wrap. Exemple (yourApp/src/yourApp/BookBundle/Entity/Account.php) :

		<?php
		
		namespace Asso\BookBundle\Entity;
		
		use winzou\BookBundle\Entity\Account as BaseAccount;
		use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
		
		
		/**
		 * @orm:Entity
		 * @orm:Table(name="ass_book_account")
		 */
		class Account extends BaseAccount
		{
		    /**
		     * @orm:Id
		     * @orm:Column(type="integer")
		     * @orm:GeneratedValue(strategy="AUTO")
		     */
		    protected $id;
		    
		    /**
		     * @orm:ManyToOne(targetEntity="Asso\AMBundle\Entity\Asso")
		     */
		    protected $wrap;
		    
		    
		    public function setWrap($wrap)
		    {
		        if( ! $wrap instanceof \Asso\AMBundle\Entity\Asso)
		        {
		            throw new InvalidArgumentException();
		        }
		        
		        $this->wrap = $wrap;
		    }
		}

* Add in your app/config.yml (Asso\BookBundle is the namespace of your overriding bundle) :

		# winzouBookBundle
		winzou_book:
		    entry:
		        entity:
		            class: Asso\BookBundle\Entity\Entry
		    account:
		        entity:
		            class: Asso\BookBundle\Entity\Account