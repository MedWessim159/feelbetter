<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Panier
 *
 * @ORM\Table(name="panier",indexes={  @ORM\Index(name="idproduit", columns={"idproduit"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_panier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPanier;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproduit", referencedColumnName="idproduit")
     * })
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
     * @ORM\Column(name="reference", type="string", length=30, nullable=false)
     */
    private $reference;

    /**
     * @return int
     */
    public function getIdPanier(): int
    {
        return $this->idPanier;
    }

    /**
     * @param int $idPanier
     */
    public function setIdPanier(int $idPanier): void
    {
        $this->idPanier = $idPanier;
    }

    /**
     * @return \Produit
     */
    public function getIdproduit(): \Produit
    {
        return $this->idproduit;
    }

    /**
     * @param \Produit $idproduit
     */
    public function setIdproduit(?Produit $idproduit): self
    {
        $this->idproduit = $idproduit;
        return $this;
    }






    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }


    public function getPrix(): ? int
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getReference(): ? string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }


}
