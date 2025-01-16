<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdaydate = null;

    #[ORM\Column(length: 255)]
    private ?string $placeofbirth = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fathername = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mothername = null;

    #[ORM\Column(length: 255)]
    private ?string $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $dateofissue = null;

    #[ORM\Column(length: 255)]
    private ?string $matricule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cnapsnumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $osie = null;

    #[ORM\Column(length: 255)]
    private ?string $companyposition = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $dateofhire = null;

    #[ORM\Column(length: 255)]
    private ?string $basesalary = null;

    #[ORM\Column(length: 255)]
    private ?string $typeofpayment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bankaccountnumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accountname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bankname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bankadress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rib = null;

    #[ORM\Column]
    private ?int $child = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthdaydate(): ?\DateTimeInterface
    {
        return $this->birthdaydate;
    }

    public function setBirthdaydate(\DateTimeInterface $birthdaydate): static
    {
        $this->birthdaydate = $birthdaydate;

        return $this;
    }

    public function getPlaceofbirth(): ?string
    {
        return $this->placeofbirth;
    }

    public function setPlaceofbirth(string $placeofbirth): static
    {
        $this->placeofbirth = $placeofbirth;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getFathername(): ?string
    {
        return $this->fathername;
    }

    public function setFathername(?string $fathername): static
    {
        $this->fathername = $fathername;

        return $this;
    }

    public function getMothername(): ?string
    {
        return $this->mothername;
    }

    public function setMothername(?string $mothername): static
    {
        $this->mothername = $mothername;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getDateofissue(): ?string
    {
        return $this->dateofissue;
    }

    public function setDateofissue(string $dateofissue): static
    {
        $this->dateofissue = $dateofissue;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getCnapsnumber(): ?string
    {
        return $this->cnapsnumber;
    }

    public function setCnapsnumber(?string $cnapsnumber): static
    {
        $this->cnapsnumber = $cnapsnumber;

        return $this;
    }

    public function getOsie(): ?string
    {
        return $this->osie;
    }

    public function setOsie(?string $osie): static
    {
        $this->osie = $osie;

        return $this;
    }

    public function getCompanyposition(): ?string
    {
        return $this->companyposition;
    }

    public function setCompanyposition(string $companyposition): static
    {
        $this->companyposition = $companyposition;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateofhire(): ?string
    {
        return $this->dateofhire;
    }

    public function setDateofhire(string $dateofhire): static
    {
        $this->dateofhire = $dateofhire;

        return $this;
    }

    public function getBasesalary(): ?string
    {
        return $this->basesalary;
    }

    public function setBasesalary(string $basesalary): static
    {
        $this->basesalary = $basesalary;

        return $this;
    }

    public function getTypeofpayment(): ?string
    {
        return $this->typeofpayment;
    }

    public function setTypeofpayment(string $typeofpayment): static
    {
        $this->typeofpayment = $typeofpayment;

        return $this;
    }

    public function getBankaccountnumber(): ?string
    {
        return $this->bankaccountnumber;
    }

    public function setBankaccountnumber(?string $bankaccountnumber): static
    {
        $this->bankaccountnumber = $bankaccountnumber;

        return $this;
    }

    public function getAccountname(): ?string
    {
        return $this->accountname;
    }

    public function setAccountname(?string $accountname): static
    {
        $this->accountname = $accountname;

        return $this;
    }

    public function getBankname(): ?string
    {
        return $this->bankname;
    }

    public function setBankname(?string $bankname): static
    {
        $this->bankname = $bankname;

        return $this;
    }

    public function getBankadress(): ?string
    {
        return $this->bankadress;
    }

    public function setBankadress(?string $bankadress): static
    {
        $this->bankadress = $bankadress;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(?string $rib): static
    {
        $this->rib = $rib;

        return $this;
    }

    public function getChild(): ?int
    {
        return $this->child;
    }

    public function setChild(int $child): static
    {
        $this->child = $child;

        return $this;
    }
}
