<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation", indexes={@ORM\Index(name="patient", columns={"idPatient"}), @ORM\Index(name="expertfk", columns={"idExpert"})})
 * @ORM\Entity
 */
class Consultation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="temps", type="string", length=11, nullable=false)
     */
    private $temps;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation", type="string", length=5, nullable=false, options={"default"="'NON'"})
     */
    private $confirmation = '\'NON\'';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPatient", referencedColumnName="ID_patient")
     * })
     */
    private $idpatient;

    /**
     * @var \Expert
     *
     * @ORM\ManyToOne(targetEntity="Expert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idExpert", referencedColumnName="IdExpert")
     * })
     */
    private $idexpert;


}
