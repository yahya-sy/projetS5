<?php

namespace App\Entity;

use App\Repository\ReponseoffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseoffreRepository::class)
 */
class Reponseoffre
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
    private $texte;

    /**
     * @ORM\OneToOne(targetEntity=Offreemploi::class, mappedBy="reponse", cascade={"persist", "remove"})
     */
    private $offreemploi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getOffreemploi(): ?Offreemploi
    {
        return $this->offreemploi;
    }

    public function setOffreemploi(?Offreemploi $offreemploi): self
    {
        // unset the owning side of the relation if necessary
        if ($offreemploi === null && $this->offreemploi !== null) {
            $this->offreemploi->setReponse(null);
        }

        // set the owning side of the relation if necessary
        if ($offreemploi !== null && $offreemploi->getReponse() !== $this) {
            $offreemploi->setReponse($this);
        }

        $this->offreemploi = $offreemploi;

        return $this;
    }
}
