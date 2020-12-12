<?php

namespace App\Entity;

use App\Repository\TaraProdRepository;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaraProdRepository::class)
 */
class TaraProd
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tara;

    /**
     * @ORM\Column(type="integer")
     */
    private $Cantitate;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\ProdDesc", mappedBy="TaraProd")
    */
    private $ProdDesc;

   
    public function __construct()
    {
        $this->ProdDesc = new ArrayCollection();
    }
	
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTara(): ?string
    {
        return $this->Tara;
    }

    public function setTara(string $Tara): self
    {
        $this->Tara = $Tara;

        return $this;
    }

    public function getCantitate(): ?int
    {
        return $this->Cantitate;
    }

    public function setCantitate(int $Cantitate): self
    {
        $this->Cantitate = $Cantitate;

        return $this;
    }

    /**
     * @return Collection|ProdDesc[]
     */
    public function getProdDesc(): Collection
    {
        return $this->ProdDesc;
    }

    public function addProdDesc(ProdDesc $prodDesc): self
    {
        if (!$this->ProdDesc->contains($prodDesc)) {
            $this->ProdDesc[] = $prodDesc;
            $prodDesc->setTaraProd($this);
        }

        return $this;
    }

    public function removeProdDesc(ProdDesc $prodDesc): self
    {
        if ($this->ProdDesc->removeElement($prodDesc)) {
           
            if ($prodDesc->getTaraProd() === $this) {
                $prodDesc->setTaraProd(null);
            }
        }

        return $this;
    }

public function __toString(){
    return $this->getTara();
}

}


