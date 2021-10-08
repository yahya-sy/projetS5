<?php

namespace App\Entity;

use App\Repository\PagedacceuilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PagedacceuilRepository::class)
 */
class Pagedacceuil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="pagedacceuil")
     */
    private $galerie;

    public function __construct()
    {
        $this->galerie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Image[]
     */
    public function getGalerie(): Collection
    {
        return $this->galerie;
    }

    public function addGalerie(Image $galerie): self
    {
        if (!$this->galerie->contains($galerie)) {
            $this->galerie[] = $galerie;
            $galerie->setPagedacceuil($this);
        }

        return $this;
    }

    public function removeGalerie(Image $galerie): self
    {
        if ($this->galerie->removeElement($galerie)) {
            // set the owning side to null (unless already changed)
            if ($galerie->getPagedacceuil() === $this) {
                $galerie->setPagedacceuil(null);
            }
        }

        return $this;
    }
}
