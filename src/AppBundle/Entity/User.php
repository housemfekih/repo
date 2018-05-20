<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



     /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $prenom;

         /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $nom;

     
    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", nullable=true)
     */
    protected $facebookID;
 
    /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", nullable=true)
     */
    protected $googleID;
        
     /**
     * @ORM\Column(type="string", nullable=true))
     *
     * @Assert\File(mimeTypes={ "image/jpg","image/png"  })
     */
          protected $avatar;

    public function __construct()
    {
        parent::__construct();
        //$this->roles = array('ROLE_USER');
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

  

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }


    /**
     * Get the value of facebookID
     *
     * @return  string
     */ 
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * Set the value of facebookID
     *
     * @param  string  $facebookID
     *
     * @return  self
     */ 
    public function setFacebookID(string $facebookID)
    {
        $this->facebookID = $facebookID;

        return $this;
    }

    /**
     * Get the value of googleID
     *
     * @return  string
     */ 
    public function getGoogleID()
    {
        return $this->googleID;
    }

    /**
     * Set the value of googleID
     *
     * @param  string  $googleID
     *
     * @return  self
     */ 
    public function setGoogleID(string $googleID)
    {
        $this->googleID = $googleID;

        return $this;
    }
  }