<?php

namespace App\Entity;

use App\Repository\ProdDescRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProdDescRepository::class)
 */
class ProdDesc
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Descriere;

    /**
     * @ORM\Column(type="integer")
     */
    private $Pret;
	
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\TaraProd", inversedBy="ProdDesc")
    */
    private $TaraProd;
	
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescriere(): ?string
    {
        return $this->Descriere;
    }

    public function setDescriere(string $Descriere): self
    {
        $this->Descriere = $Descriere;

        return $this;
    }

    public function getPret(): ?int
    {
        return $this->Pret;
    }

    public function setPret(int $Pret): self
    {
        $this->Pret = $Pret;

        return $this;
    }

    public function getTaraProd(): ?TaraProd
    {
        return $this->TaraProd;
    }

    public function setTaraProd(?TaraProd $TaraProd): self
    {
        $this->TaraProd = $TaraProd;

        return $this;
    }
}
