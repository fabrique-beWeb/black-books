<?php

namespace LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="LibraryBundle\Repository\BookRepository")
 */
class Book implements \JsonSerializable
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
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="isbn", type="integer", unique=true)
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=512, unique=true)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="vignette", type="string", length=255, nullable=true, unique=true)
     */
    private $vignette;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumn(name="fk_author", referencedColumnName="id")
     */
    private $author;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @ORM\JoinColumn(name="fk_editeur", referencedColumnName="id")
     */
    private $editeur;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Book
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set isbn
     *
     * @param integer $isbn
     *
     * @return Book
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return int
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Book
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set vignette
     *
     * @param string $vignette
     *
     * @return Book
     */
    public function setVignette($vignette)
    {
        $this->vignette = $vignette;

        return $this;
    }

    /**
     * Get vignette
     *
     * @return string
     */
    public function getVignette()
    {
        return $this->vignette;
    }

    /**
     * Set author
     *
     * @param \stdClass $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \stdClass
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set editeur
     *
     * @param \stdClass $editeur
     *
     * @return Book
     */
    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get editeur
     *
     * @return \stdClass
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    public function jsonSerialize() {
        return array(
            "id" => $this->id,
            "titre" => $this->titre,
            "isbn" => $this->isbn,
            "author" => $this->author,
            "editeur" => $this->editeur,
            "resume" => $this->resume
        );
    }

}

