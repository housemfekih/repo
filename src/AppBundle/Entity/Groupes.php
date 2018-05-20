<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupes
 *
 * @ORM\Table(name="groupes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupesRepository")
 */
class Groupes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomGroupe", type="string", length=255)
     */
    private $nomGroupe;

        
  
    

    /**
        * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Sections", cascade={"persist"})
        * @ORM\JoinTable(name="sectionsGroupeRel")  
        */
    private $sectionsGroupeRel;
    


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sectionsGroupeRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomGroupe
     *
     * @param string $nomGroupe
     *
     * @return Groupes
     */
    public function setNomGroupe($nomGroupe)
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    /**
     * Get nomGroupe
     *
     * @return string
     */
    public function getNomGroupe()
    {
        return $this->nomGroupe;
    }

    /**
     * Add sectionsGroupeRel
     *
     * @param \AppBundle\Entity\Sections $sectionsGroupeRel
     *
     * @return Groupes
     */
    public function addSectionsGroupeRel(\AppBundle\Entity\Sections $sectionsGroupeRel)
    {
        $this->sectionsGroupeRel[] = $sectionsGroupeRel;

        return $this;
    }

    /**
     * Remove sectionsGroupeRel
     *
     * @param \AppBundle\Entity\Sections $sectionsGroupeRel
     */
    public function removeSectionsGroupeRel(\AppBundle\Entity\Sections $sectionsGroupeRel)
    {
        $this->sectionsGroupeRel->removeElement($sectionsGroupeRel);
    }

    /**
     * Get sectionsGroupeRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSectionsGroupeRel()
    {
        return $this->sectionsGroupeRel;
    }
}
