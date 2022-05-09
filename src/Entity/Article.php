<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="fkIdExpert", columns={"IdExpert"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=30, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=50, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="string", length=500, nullable=false, options={"default"="'non'"})
     */
    private $article = '\'non\'';

    /**
     * @var string
     *
     * @ORM\Column(name="nom_auteur", type="string", length=30, nullable=false)
     */
    private $nomAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="approuver", type="string", length=255, nullable=false, options={"default"="'Non'"})
     */
    private $approuver = '\'Non\'';

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=255, nullable=false)
     */
    private $theme;

    /**
     * @var int
     *
     * @ORM\Column(name="IdExpert", type="integer", nullable=false)
     */
    private $idexpert;

    public function getIdarticle(): ?int
    {
        return $this->idarticle;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getNomAuteur(): ?string
    {
        return $this->nomAuteur;
    }

    public function setNomAuteur(string $nomAuteur): self
    {
        $this->nomAuteur = $nomAuteur;

        return $this;
    }

    public function getApprouver(): ?string
    {
        return $this->approuver;
    }

    public function setApprouver(string $approuver): self
    {
        $this->approuver = $approuver;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getIdexpert(): ?int
    {
        return $this->idexpert;
    }

    public function setIdexpert(int $idexpert): self
    {
        $this->idexpert = $idexpert;

        return $this;
    }


}
