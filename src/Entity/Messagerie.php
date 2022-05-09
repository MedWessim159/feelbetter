<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagerie
 *
 * @ORM\Table(name="messagerie", indexes={@ORM\Index(name="fkIdExpert2", columns={"IdExpert"}), @ORM\Index(name="fkIdPatient3", columns={"IdPatient"})})
 * @ORM\Entity
 */
class Messagerie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_message", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi", type="date", nullable=false)
     */
    private $dateEnvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=100, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_recep", type="date", nullable=false)
     */
    private $dateRecep;

    /**
     * @var \Expert
     *
     * @ORM\ManyToOne(targetEntity="Expert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdExpert", referencedColumnName="IdExpert")
     * })
     */
    private $idexpert;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdPatient", referencedColumnName="ID_patient")
     * })
     */
    private $idpatient;


}
