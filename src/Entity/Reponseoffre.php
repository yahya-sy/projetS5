<?php

namespace App\Entity;

use App\Repository\ReponseoffreRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity(repositoryClass=ReponseoffreRepository::class)
 * @Vich\Uploadable
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
     * @ORM\ManyToOne(targetEntity=Offreemploi::class, inversedBy="reponseoffres")
     * @ORM\JoinColumn (nullable=false, referencedColumnName="id")
     */
    private $idoffre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CV;

    /**
     * @Vich\UploadableField(mapping="article_cv", fileNameProperty="CV")
     * @var File
     */
    private $CVFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lettre;

    /**
     * @Vich\UploadableField(mapping="article_lettre", fileNameProperty="lettre")
     * @var File
     */
    private $lettreFile;

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

    public function getIdoffre(): ?Offreemploi
    {
        return $this->idoffre;
    }

    public function setIdoffre(?Offreemploi $idoffre): self
    {
        $this->idoffre = $idoffre;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(string $CV): self
    {
        $this->CV = $CV;

        return $this;
    }

    public function getLettre(): ?string
    {
        return $this->lettre;
    }

    public function setLettre(string $lettre): self
    {
        $this->lettre = $lettre;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getCVFile(): ?File
    {
        return $this->CVFile;
    }

    /**
     * @param File|null $CVFile
     */
    public function setCVFile(?File $CVFile=null): void
    {
        $this->CVFile = $CVFile;
    }

    /**
     * @return File | null
     */
    public function getLettreFile(): ?File
    {
        return $this->lettreFile;
    }

    /**
     * @param File|null $lettreFile
     */
    public function setLettreFile(?File $lettreFile=null): void
    {
        $this->lettreFile = $lettreFile;
    }


}
