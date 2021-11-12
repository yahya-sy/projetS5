<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $texte;

    /**
     * @ORM\ManyToMany(targetEntity=Image::class, inversedBy="ref")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="articles")
     */
    private $users;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImages(Image $images): self
    {
        if (!$this->images->contains($images)) {
            $this->images[] = $images;
        }

        return $this;
    }

    public function removeImages(Image $images): self
    {
            if ($this->images->contains($image)) {
                $this->images->removeElement($image);
                // set the owning side to null (unless already changed)
                if ($image->getArticles() === $this) {
                    $image->setArticles(null);
                }
            }
            return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setArticles($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getArticles() === $this) {
                $user->setArticles(null);
            }
        }

        return $this;
    }
}
