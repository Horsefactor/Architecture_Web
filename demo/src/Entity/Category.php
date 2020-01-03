<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ApiResource()
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonces"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Annonce", mappedBy="categories")
     * @ORM\JoinTable(name="category_annonce")
     */
    private $Annonces;

    public function __construct()
    {
        $this->Annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->Annonces;
    }

    public function addAnnonce(Annonce $Annonce): self
    {
        if (!$this->Annonces->contains($Annonce)) {
            $this->Annonces[] = $Annonce;
        }

        return $this;
    }

    public function removeAnnonce(Annonce $Annonce): self
    {
        if ($this->Annonces->contains($Annonce)) {
            $this->Annonces->removeElement($Annonce);
        }

        return $this;
    }
}
