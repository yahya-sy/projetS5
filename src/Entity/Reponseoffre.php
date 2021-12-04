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
     * @ORM\OneToOne(targetEntity=Offreemploi::class, mappedBy="reponse", cascade={"persist", "remove"})
     */
    private $offreemploi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Competences;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offrechoisie;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCompetences(): ?string
    {
        return $this->Competences;
    }

    public function setCompetences(string $Competences): self
    {
        $this->Competences = $Competences;

        return $this;
    }

    public function getOffrechoisie(): ?string
    {
        return $this->offrechoisie;
    }

    public function setOffrechoisie(string $offrechoisie): self
    {
        $this->offrechoisie = $offrechoisie;

        return $this;
    }
}
