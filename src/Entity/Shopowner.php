<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shopowner
 *
 * @ORM\Table(name="shopowner")
 * @ORM\Entity
 */
class Shopowner
{
    /**
     * @var int
     *
     * @ORM\Column(name="idOwner", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idowner;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=25, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseMail", type="string", length=50, nullable=false)
     */
    private $adressemail;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="motdepasse", type="string", length=32, nullable=false)
     */
    private $motdepasse;

    /**
     * @ORM\OneToMany (targetEntity="Produit",mappedBy="shopowner")
     */
    private $produits;
    public function __construct()
    {
        $this->produits= new ArrayCollection();

    }

    /**
     * @return int
     */
    public function getIdowner(): int
    {
        return $this->idowner;
    }

    /**
     * @param int $idowner
     */
    public function setIdowner(int $idowner): void
    {
        $this->idowner = $idowner;
    }


    public function getNom():? string
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

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getAdressemail(): string
    {
        return $this->adressemail;
    }

    /**
     * @param string $adressemail
     */
    public function setAdressemail(string $adressemail): void
    {
        $this->adressemail = $adressemail;
    }

    /**
     * @return int
     */
    public function getTel(): int
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel(int $tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @return string
     */
    public function getMotdepasse(): string
    {
        return $this->motdepasse;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse(string $motdepasse): void
    {
        $this->motdepasse = $motdepasse;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setShopowner($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getShopowner() === $this) {
                $produit->setShopowner(null);
            }
        }

        return $this;
    }


    }


