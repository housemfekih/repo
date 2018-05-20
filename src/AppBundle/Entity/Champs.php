<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Champs
 *
 * @ORM\Table(name="champs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampsRepository")
 */
class Champs
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
     * @ORM\Column(name="nomChamps", type="string", length=255)
     */
    private $nomChamps;
    /**
     * @var string
     *
     * @ORM\Column(name="typeChamps", type="string", length=255)
     */
    private $typeChamps; /**
     * @var string
     *
     * @ORM\Column(name="longeurChamps", type="string", length=255)
     */
    private $longeurChamps;






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
     * Set nomChamps
     *
     * @param string $nomChamps
     *
     * @return Champs
     */
    public function setNomChamps($nomChamps)
    {
        $this->nomChamps = $nomChamps;

        return $this;
    }

    /**
     * Get nomChamps
     *
     * @return string
     */
    public function getNomChamps()
    {
        return $this->nomChamps;
    }

    /**
     * Set typeChamps
     *
     * @param string $typeChamps
     *
     * @return Champs
     */
    public function setTypeChamps($typeChamps)
    {
        $this->typeChamps = $typeChamps;

        return $this;
    }

    /**
     * Get typeChamps
     *
     * @return string
     */
    public function getTypeChamps()
    {
        return $this->typeChamps;
    }

    /**
     * Set longeurChamps
     *
     * @param string $longeurChamps
     *
     * @return Champs
     */
    public function setLongeurChamps($longeurChamps)
    {
        $this->longeurChamps = $longeurChamps;

        return $this;
    }

    /**
     * Get longeurChamps
     *
     * @return string
     */
    public function getLongeurChamps()
    {
        return $this->longeurChamps;
    }
}
