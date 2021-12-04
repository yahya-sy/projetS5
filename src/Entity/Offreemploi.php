<?php

namespace App\Entity;

use App\Repository\OffreemploiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreemploiRepository::class)
 */
class Offreemploi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\OneToOne(targetEntity=Reponseoffre::class, inversedBy="offreemploi", cascade={"persist", "remove"})
     */
    private $reponse;

    /**
     * @ORM\OneToMany(targetEntity=Reponseoffre::class, mappedBy="idoffre", orphanRemoval=true)
     */
    private $reponseoffres;

    public function __construct()
    {
        $this->reponseoffres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getReponse(): ?Reponseoffre
    {
        return $this->reponse;
    }

    public function setReponse(?Reponseoffre $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString():string
    {
        return (string)$this->getReponse();
    }

    /**
     * @return Collection|Reponseoffre[]
     */
    public function getReponseoffres(): Collection
    {
        return $this->reponseoffres;
    }

    public function addReponseoffre(Reponseoffre $reponseoffre): self
    {
        if (!$this->reponseoffres->contains($reponseoffre)) {
            $this->reponseoffres[] = $reponseoffre;
            $reponseoffre->setIdoffre($this);
        }

        return $this;
    }

    public function removeReponseoffre(Reponseoffre $reponseoffre): self
    {
        if ($this->reponseoffres->removeElement($reponseoffre)) {
            // set the owning side to null (unless already changed)
            if ($reponseoffre->getIdoffre() === $this) {
                $reponseoffre->setIdoffre(null);
            }
        }

        return $this;
    }
}
