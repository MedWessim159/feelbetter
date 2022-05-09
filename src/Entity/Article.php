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


}
