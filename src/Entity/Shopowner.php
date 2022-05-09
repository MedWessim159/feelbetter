<?php

namespace App\Entity;

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


}
