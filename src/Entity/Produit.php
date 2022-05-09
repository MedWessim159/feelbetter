<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="fkIdShopOwner", columns={"IdShopOwner"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="idproduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;

    /**
     * @var int
     *
     * @ORM\Column(name="nom", type="integer", nullable=false)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="quantitÃ©", type="integer", nullable=false)
     */
    private $quantitã©;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="image", type="integer", nullable=false)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="discreption", type="integer", nullable=false)
     */
    private $discreption;

    /**
     * @var int
     *
     * @ORM\Column(name="IdShopOwner", type="integer", nullable=false)
     */
    private $idshopowner;


}
