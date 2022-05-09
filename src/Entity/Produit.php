<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="IdShopOwner", columns={"IdShopOwner"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     *
     */

    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=30, nullable=false)
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=70, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="discreption", type="string", length=100, nullable=false)
     */
    private $discreption;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Shopowner",inversedBy="produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdShopOwner", referencedColumnName="idOwner")
     * })
     */
    private $shopowner;


    /**
     * @return int
     */
    public function getIdproduit(): int
    {
        return $this->idproduit;
    }



    public function getNom(): ?string
    {
        return $this->nom;
    }




    public function getReference(): ?string
    {
        return $this->reference;
    }




    public function getQuantite(): ? int
    {
        return $this->quantite;
    }




    public function getPrix():?int
    {
        return $this->prix;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }




    public function getDiscreption():? string
    {
        return $this->discreption;
    }



    public function getShopowner(): ?Shopowner
    {
        return $this->shopowner;
    }

    /**
     * @param int $idproduit
     */
    public function setIdproduit(int $idproduit): void
    {
        $this->idproduit = $idproduit;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    /**
     * @param int $prix
     */
    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string $discreption
     */
    public function setDiscreption(string $discreption): void
    {
        $this->discreption = $discreption;
    }


    public function setShopowner(?Shopowner $shopowner): void
    {
        $this->shopowner = $shopowner;
    }





}
