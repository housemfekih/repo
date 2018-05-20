<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Templates
 *
 * @ORM\Table(name="templates")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TemplatesRepository")
 */
class Templates
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
     * @ORM\Column(name="nomTemlate", type="string", length=255)
     */
    private $nomTemplate;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "text/html" })
     */
    private $fichierNom;

   /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groupes",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupeId;


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
     * Set nomTemplate
     *
     * @param string $nomTemplate
     *
     * @return Templates
     */
    public function setNomTemplate($nomTemplate)
    {
        $this->nomTemplate = $nomTemplate;

        return $this;
    }

    /**
     * Get nomTemplate
     *
     * @return string
     */
    public function getNomTemplate()
    {
        return $this->nomTemplate;
    }

    /**
     * Set fichierNom
     *
     * @param string $fichierNom
     *
     * @return Templates
     */
    public function setFichierNom($fichierNom)
    {
        $this->fichierNom = $fichierNom;

        return $this;
    }

    /**
     * Get fichierNom
     *
     * @return string
     */
    public function getFichierNom()
    {
        return $this->fichierNom;
    }

    /**
     * Set groupeId
     *
     * @param \AppBundle\Entity\Groupes $groupeId
     *
     * @return Templates
     */
    public function setGroupeId(\AppBundle\Entity\Groupes $groupeId)
    {
        $this->groupeId = $groupeId;

        return $this;
    }

    /**
     * Get groupeId
     *
     * @return \AppBundle\Entity\Groupes
     */
    public function getGroupeId()
    {
        return $this->groupeId;
    }
}
