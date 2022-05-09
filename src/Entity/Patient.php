<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_patient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPatient;

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
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime", nullable=false)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="etatCivile", type="string", length=25, nullable=false)
     */
    private $etatcivile;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseMail", type="string", length=50, nullable=false)
     */
    private $adressemail;

	/**
	 * @return int
	 */
	public function getIdPatient(): int
	{
		return $this->idPatient;
	}

	/**
	 * @param int $idPatient
	 */
	public function setIdPatient(int $idPatient): void
	{
		$this->idPatient = $idPatient;
	}

	/**
	 * @return string
	 */
	public function getNom(): string
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
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword(string $password): void
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getAdresse(): string
	{
		return $this->adresse;
	}

	/**
	 * @param string $adresse
	 */
	public function setAdresse(string $adresse): void
	{
		$this->adresse = $adresse;
	}

	/**
	 * @return \DateTime
	 */
	public function getDatenaissance(): \DateTime
	{
		return $this->datenaissance;
	}

	/**
	 * @param \DateTime $datenaissance
	 */
	public function setDatenaissance(\DateTime $datenaissance): void
	{
		$this->datenaissance = $datenaissance;
	}

	/**
	 * @return string
	 */
	public function getEtatcivile(): string
	{
		return $this->etatcivile;
	}

	/**
	 * @param string $etatcivile
	 */
	public function setEtatcivile(string $etatcivile): void
	{
		$this->etatcivile = $etatcivile;
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


}
