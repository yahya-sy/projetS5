<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="blob")
     */
    private $fichierimg;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, mappedBy="galerie")
     */
    private $ref;

    /**
     * @ORM\ManyToOne(targetEntity=Pagedacceuil::class, inversedBy="galerie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pagedacceuil;

    public function __construct()
    {
        $this->ref = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichierimg()
    {
        return $this->fichierimg;
    }

    public function setFichierimg($fichierimg): self
    {
        $this->fichierimg = $fichierimg;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getRef(): Collection
    {
        return $this->ref;
    }

    public function addRef(Article $ref): self
    {
        if (!$this->ref->contains($ref)) {
            $this->ref[] = $ref;
            $ref->addGalerie($this);
        }

        return $this;
    }

    public function removeRef(Article $ref): self
    {
        if ($this->ref->removeElement($ref)) {
            $ref->removeGalerie($this);
        }

        return $this;
    }

    public function getPagedacceuil(): ?Pagedacceuil
    {
        return $this->pagedacceuil;
    }

    public function setPagedacceuil(?Pagedacceuil $pagedacceuil): self
    {
        $this->pagedacceuil = $pagedacceuil;

        return $this;
    }
}
