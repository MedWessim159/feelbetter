<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 */
class Admin
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAdmin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadmin;

    /**
     * @var int
     *
     * @ORM\Column(name="nom", type="integer", nullable=false)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="prenom", type="integer", nullable=false)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="adresseMail", type="integer", nullable=false)
     */
    private $adressemail;

    /**
     * @var int
     *
     * @ORM\Column(name="password", type="integer", nullable=false)
     */
    private $password;


}
