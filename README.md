winzouBookBundle
=================

Important information
---------------------
This bundle is not maintained anymore since it has been merge into my project. If you are still interested in its code, no problem just fork it.


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
        
        use winzou\BookBundle\Entity\Entry as BaseEntry;
        use Symfony\Component\Security\Core\User\UserInterface;
        
        use Doctrine\ORM\Mapping as ORM;
        use Symfony\Component\Validator\Constraints as Assert;
        
        /**
         * @ORM\Entity
         * @ORM\Table(name="ass_book_entry")
         */
        class Entry extends BaseEntry
        {
            /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;
            
            /**
             * @ORM\ManyToOne(targetEntity="Asso\AMBundle\Entity\User")
             */
            protected $user;
            
            /**
             * @ORM\ManyToOne(targetEntity="Asso\BookBundle\Entity\Account")
             * @ORM\JoinColumn(nullable=false)
             */
            protected $account;
        }

* Extend the Account entity with the definition of id and wrap. Exemple (yourApp/src/yourApp/BookBundle/Entity/Account.php) :

        <?php
        
        namespace Asso\BookBundle\Entity;
        
        use winzou\BookBundle\Entity\Account as BaseAccount;
        use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
        
        use Doctrine\ORM\Mapping as ORM;
        use Symfony\Component\Validator\Constraints as Assert;
        
        /**
         * @ORM\Entity
         * @ORM\Table(name="ass_book_account")
         */
        class Account extends BaseAccount
        {
            /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;
            
            /**
             * @ORM\ManyToOne(targetEntity="Asso\AMBundle\Entity\Asso")
             */
            protected $wrap;
            
            
            public function setWrap($wrap)
            {
                if( ! $wrap instanceof Asso\AMBundle\Entity\Asso)
                {
                    throw new InvalidArgumentException('Expecting instance of Asso\AMBundle\Entity\Asso');
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

* Add __toString() method to your wrap entity for ChoiceList