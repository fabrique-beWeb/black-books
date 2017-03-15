<?php

namespace LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exemplaire
 *
 * @ORM\Table(name="exemplaire")
 * @ORM\Entity(repositoryClass="LibraryBundle\Repository\ExemplaireRepository")
 */
class Exemplaire implements \JsonSerializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="fk_book", referencedColumnName="id")
     */
    private $book;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumn(name="fk_etat", referencedColumnName="id")
     */
    private $etat;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="fk_status", referencedColumnName="id")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=5, scale=2)
     */
    private $price;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set book
     *
     * @param \stdClass $book
     *
     * @return Exemplaire
     */
    public function setBook($book) {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \stdClass
     */
    public function getBook() {
        return $this->book;
    }

    /**
     * Set etat
     *
     * @param \stdClass $etat
     *
     * @return Exemplaire
     */
    public function setEtat($etat) {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \stdClass
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set status
     *
     * @param \stdClass $status
     *
     * @return Exemplaire
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \stdClass
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Exemplaire
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    public function jsonSerialize() {
        return array(
            "etat" => $this->etat,
            "id" => $this->id,
            "prix" => $this->price,
            "status" => $this->status,
        );
    }

}
