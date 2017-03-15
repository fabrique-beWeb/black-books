<?php

namespace LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editeur
 *
 * @ORM\Table(name="editeur")
 * @ORM\Entity(repositoryClass="LibraryBundle\Repository\EditeurRepository")
 */
class Editeur implements \JsonSerializable
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
     * @ORM\Column(name="maison", type="string", length=255)
     */
    private $maison;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set maison
     *
     * @param string $maison
     *
     * @return Editeur
     */
    public function setMaison($maison)
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * Get maison
     *
     * @return string
     */
    public function getMaison()
    {
        return $this->maison;
    }

    public function jsonSerialize() {
        return array(
        "maison" => $this->maison  
        );
    }

}

